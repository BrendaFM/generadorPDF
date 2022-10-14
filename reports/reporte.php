<?php
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{

  //Variables obtenidas del BACKEND || MODELS
  //   $variable = $objeto -> getVALOR();
  $usuario = "Brenda Andrea Francia Minaya";
  $destinatario = "Hwang Hyunjin";  
  $cargo = "Integrante de Stray Kids";

  $programas = ["Visual Studio Code", "Android Studio", "MS SQL Server"];

  ob_start();

  $data = "";

  // cargar estilos
  include './informe/estilos.html';
  //Páginas:
  include './informe/page-1.php';
  include './informe/page-2.php';
  include './informe/page-3.php';

  //Otras páginas:
  $data .= ob_get_clean();

  //Creando espacio
  //   P vertical / L en horizontal
  $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'utf-8', array(10,10,15,15));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);

  $html2pdf->output('reporte-senati.pdf');

}
catch(Html2PdfException $e){
  $html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}

?>