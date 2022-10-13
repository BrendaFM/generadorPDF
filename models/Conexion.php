<?php


class Conexion{

    //Atributo que almacena la conexión
    protected $pdo;

    //Método que accede al servidor y a la BD
    private function Conectar(){
        $cn = new PDO("mysql:host=localhost;port=3306;dbname=experimentos;charset=utf8","root","");
        return $cn;
    }

    //Método que retorna / compartirá la conexión
    public function getConexion(){
       try{
        //Almacenamos la conexión en el atributo 'pdo'
        $pdo = $this->Conectar();

         //Controlar exepciones
         $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

        //Retornamos la conexión
         return $pdo;
       }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
} 

?>