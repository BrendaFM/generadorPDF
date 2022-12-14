CREATE DATABASE experimentos;
USE experimentos;

-- 1833 Registros en el ubigeo
SELECT COUNT(*) FROM ubigeos;

CREATE VIEW vs_ubigeo_full
AS
	SELECT ubigeo,
		CONCAT(dpto, ' - ', prov, ' - ', distrito) AS 'text'
	FROM ubigeos
	ORDER BY 2;


DELIMITER $$
CREATE PROCEDURE spu_ubigeos_buscar(IN _valorbuscado VARCHAR(30))
BEGIN
	SELECT * FROM vs_ubigeo_full
	WHERE vs_ubigeo_full.text LIKE CONCAT('%', _valorbuscado, '%');
END $$

CALL spu_ubigeos_buscar('Pueblo');

CREATE TABLE comentarios (
	idcomentario 		INT 		AUTO_INCREMENT PRIMARY KEY,
	comentario		TEXT 		NOT NULL,
	fechacomentario 	DATETIME 	DEFAULT NOW()
)ENGINE=INNODB;

DELIMITER$$
CREATE PROCEDURE spu_comentario_registrar(IN _comentario TEXT)
BEGIN
	INSERT INTO comentarios (comentario) VALUES(_comentario);
END$$

CALL spu_comentario_registrar('<p>Hola Mundo</p>');
CALL spu_comentario_registrar('<strong>SENATI</strong>');

DELIMITER$$
CREATE PROCEDURE spu_comentario_ultimo()
BEGIN
	SELECT * FROM comentarios ORDER BY idcomentario DESC LIMIT 1; 
END$$

CREATE VIEW vista_user_details_full
AS
SELECT user_id, username, first_name, last_name, gender FROM user_details; 

-- -----------------------
CREATE TABLE equipos
(
	idequipo		INT 		AUTO_INCREMENT PRIMARY KEY,	
	nombre   		VARCHAR(30)	NOT NULL,
	precio 			DECIMAL(7,2) 	NOT NULL,
	garantia 		TINYINT 	NOT NULL,
	especificaciones 	JSON 		NULL
)ENGINE = INNODB;

SELECT * FROM equipos

INSERT INTO equipos (nombre, precio, garantia, especificaciones) VALUES
	('Samsung Galaxy S3', 1200.00, 12, '{"capacidad":512, "ram": 1024}');

