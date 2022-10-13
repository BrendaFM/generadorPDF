<?php

    require_once '../dist/phpqrcode/qrlib.php';

    if(isset($_GET['operacion'])){
        if($_GET['operacion'] == 'generarQR'){
            
            // Forma 1
            // QRCode::png("Anderson Belleza", "../views/images/miQR.png", "H", 14, 2);
            
            // Forma 2
            $textoQR = $_GET['textoQR'];
            $ruta = '../views/images/';
            $nombreArchivo = 'QRFroma2.png';
            $calidad = $_GET['calidad'];
            $tamQR = $_GET['tamQR'];
            $marco = $_GET['marco']; 


            $rutacompleta = $ruta . $nombreArchivo;

            // Creamos un número aleatorio
            $aleatorio = rand(1, 1000);

            QRCode::png($textoQR, $rutacompleta , $calidad, $tamQR, $marco);
            echo "<img src='{$rutacompleta}?tmp={$aleatorio}'>";
        }
    }

?>