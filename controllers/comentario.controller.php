<?php

    require_once '../models/Comentario.php';

    // $_REQUEST[]
    if(isset($_GET['operacion'])){
        $comentario = new Comentario();

        $operacion = $_GET['operacion'];

        if($operacion == 'registrar'){
            $comentario->registrar($_GET['comentario']);
        }

        if($operacion == 'getUltimo'){
            echo json_encode($comentario->getUltimo());
        }
    }

?>