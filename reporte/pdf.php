<?php
  session_start();
  include ("../conex.php");
  require_once("dompdf/dompdf_config.inc.php");
  $html='<h1 align="center" style="color:#0096ff;">CENTRO CRISTIANO RESTAURACIÓN MUNDIAL</h1>';
  $html.='<h2 align="center">Datos completos de los '. $_GET["tipo_de_reporte"].'</h2>';
  $html.='<table border="1" width="100%">';
  $html.='<tr><td><center><b>Cedula:</b></center></td><td><center><b>Nombre:</b></center></td><td><center><b>Apellido:</b></center></td><td><center><b>Direccion:</b></center></td><td><center><b>Telefono:</b></center></td><td><center><b>Fecha Nac.:</b></center></td><td><center><b>Correo:</b></center></td></tr>';
  //if(isset($_SESSION['w'])) $where = $_SESSION['w'];
  //else $where = "";
  $tipo = $_GET["tipo_de_reporte"];
  $sql = "SELECT * FROM". $tipo ;
  //." ". $where;
  $consulta=mysqli_query($enlace, $sql);
  //$dato=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
    if ($tipo == "estudiantes") {
      $html.='Texto de prueba 0';
      while ($dato = mysqli_fetch_assoc($consulta)) {
        $html.="<tr><td><center>".$dato['ci_est']."</center></td><td><center>".$dato['nom_est']."</center></td><td><center>".$dato['ape_est']."</center></td><td><center>".$dato['dir_est']."</center></td><td><center>".$dato['tel_est']."</center></td><td><center>".$dato['fec_nac_est']."</center></td><td><center>".$dato['corr_est']."</center></td></tr>";
      }
    };
    if ($tipo == "trabajadores") {
      $html.='Texto de prueba 1';
      $dato = mysqli_fetch_assoc($consulta);
        $html.= $dato;
      while ($dato = mysqli_fetch_assoc($consulta)){
          $html.='Texto de prueba 2';
          $html.="<tr><td><center>".$dato['ci_tra']."</center></td><td><center>".$dato['nom_tra']."</center></td><td><center>".$dato['apetra']."</center></td><td><center>".$dato['dir_tra']."</center></td><td><center>".$dato['tel_tra']."</center></td><td><center>".$dato['fec_nac_tra']."</center></td><td><center>".$dato['corr_tra']."</center></td></tr>";
        }
    };
  /*  if ($tipo =='administrador') {
        while($dato=mysqli_fetch_array($consulta)){
            $html.="<tr><td><center>".$dato['ci_est']."</center></td><td><center>".$dato['nom_est']."</center></td><td><center>".$dato['ape_est']."</center></td><td><center>".$dato['dir_est']."</center></td><td><center>".$dato['tel_est']."</center></td><td><center>".$dato['fec_nac_est']."</center></td><td><center>".$dato['corr_est']."</center></td></tr>";
        };
    };*/
  $html.="</table>";
  $html = stripslashes($html);
  $dompdf = new DOMPDF();
  $dompdf->load_html(utf8_decode($html));
  $dompdf->set_paper(array(0, 0, 700, 700), "portrait");
  $dompdf->render();
  $dompdf->stream("Reporte_".$tipo.".pdf");
    exit(0);
?>
