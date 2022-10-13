<?php

    require_once '../models/Ubigeo.php';

    // $_REQUEST[]
    if(isset($_GET['operacion'])){
        $ubigeo = new Ubigeo();

        $operacion = $_GET['operacion'];

        if($operacion == 'getUbigeo'){
            //echo json_encode($ubigeo->getUbigeo($_GET['valorBuscado']));

            $valor = $ubigeo->getUbigeo($_GET['valorBuscado']);
            echo json_encode($valor);
        }
    }

?>