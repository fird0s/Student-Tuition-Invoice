<?php
 
require_once("dompdf_config.inc.php"); //memanggil file dompdf_config.inc.php



$dompdf = new DOMPDF();
$dompdf->load_html_file("data.php");
$customPaper = array(0,0,745,480);
$dompdf->set_paper("a4", 'portrait');
$dompdf->render();
$dompdf->stream("Slip Bukti.pdf", array("Attachment" => false)); 

?>