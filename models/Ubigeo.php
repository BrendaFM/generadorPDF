<?php

    require_once 'Conexion.php';

    class Ubigeo extends Conexion{
        // Objeto que almacena la conexión
        private $acceso;

        public function __construct(){
            $this->acceso = parent::getConexion();
        }

        // Método que aprovechará al SPU
        public function getUbigeo($valorBuscado = ''){
            try{    
                $comando = $this->acceso->prepare("CALL spu_ubigeos_buscar(?)");
                $comando->execute(array($valorBuscado));

                // Retorno un arreglo asociativo => JSON
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $error){
                die($error->getMessage());
            }
        }
    }

?>


