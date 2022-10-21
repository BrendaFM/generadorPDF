<?php
require_once 'Conexion.php';
class User extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function ListarUsuarios(){
        try {
            $consulta = $this->acceso->prepare("SELECT user_id, username, first_name, last_name, gender FROM user_details LIMIT 10000");
            $consulta->execute();
            return $consulta ->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>