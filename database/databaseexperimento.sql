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

