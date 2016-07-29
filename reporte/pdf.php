<?php
session_start();
include ("../conex.php");
require_once("dompdf/dompdf_config.inc.php");
$html='<h1 align="center" style="color:#0096ff;">CENTRO CRISTIANO RESTAURACIÓN MUNDIAL</h1>';
$html.='<h2 align="center">Datos completos de los estudiantes</h2>';
$html.='<table border="1" width="100%">';
$html.='<tr><td><center><b>Cedula:</b></center></td><td><center><b>Nombre:</b></center></td><td><center><b>Apellido:</b></center></td><td><center><b>Direccion:</b></center></td><td><center><b>Telefono:</b></center></td><td><center><b>Fecha Nac.:</b></center></td><td><center><b>Correo:</b></center></td></tr>';
if(isset($_SESSION['w'])) $where = $_SESSION['w']; else $where = "";
$sql = "SELECT * FROM estudiantes ".$where;
$consulta=mysql_query($sql,$enlace) or die("Error" . mysql_error());
while($dato=mysql_fetch_array($consulta)){
$html.="<tr><td><center>".$dato['ci_est']."</center></td><td><center>".$dato['nom_est']."</center></td><td><center>".$dato['ape_est']."</center></td><td><center>".$dato['dir_est']."</center></td><td><center>".$dato['tel_est']."</center></td><td><center>".$dato['fec_nac_est']."</center></td><td><center>".$dato['corr_est']."</center></td></tr>";
}
$html.="</table>";

//echo $html; exit();
 $html = stripslashes($html);
  //$old_limit = ini_set("memory_limit", "16M");
  $dompdf = new DOMPDF();
  $dompdf->load_html(utf8_decode($html));
  $dompdf->set_paper(array(0, 0, 700, 700), "portrait");
  $dompdf->render();
  $dompdf->stream("Estudiantes.pdf");
   exit(0); 
?>
