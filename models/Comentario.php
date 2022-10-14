<?php

    require_once 'Conexion.php';

    class Comentario extends Conexion{
        // Objeto que almacena la conexión
        private $acceso;

        public function __construct(){
            $this->acceso = parent::getConexion();
        }

        // Método que aprovechará al SPU
        public function registrar($comentario){
            try{    
                $comando = $this->acceso->prepare("CALL spu_comentario_registrar(?)");
                $comando->execute(array($comentario));
            }catch(Exception $error){
                die($error->getMessage());
            }
        }

        public function getUltimo(){
            try {
                $comando = $this->acceso->prepare("CALL spu_comentario_ultimo()");
                $comando->execute();
                return $comando->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                die($e -> getMessage());
            }
        }
    }

?>
