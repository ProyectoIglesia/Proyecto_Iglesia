<?php
include ("formulario.php");
session_start();
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}

?>
<!doctype html>
<html>
<head>
		<title>Centro Cristiano Restauración Mundial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/fonts.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>


	</head>

<body>

<!-- Redes sociales - Barra lateral -->
<div class="social">
    <ul>
      <li><a href="https://www.facebook.com/restauramundial" target="_blank" class="icon-facebook"></a></li>
      <li><a href="http://www.twitter.com/" target="_blank" class="icon-twitter"></a></li>
      <li><a href="http://www.youtube.com/" target="_blank" class="icon-youtube"></a></li>
      <li><a href="http://www.instagram.com/" target="_blank" class="icon-instagram"></a></li>
      <li><a href="mailto:restauracionmundial@gmail.com" class="icon-mail"></a></li>
    </ul>
  </div>
<!-- Fin Redes sociales - Barra lateral -->


<!-- Header2 -->
    <header2>
        
    <div class="logo">
          <img src="images/logo.png" width="230" height="50">
        </div>
        
  <nav>
    <ul>
      <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Inscribir capacitación destino</a></li>
            <li><a href="notas.php">Ver notas capacitación destino</a></li>
            <li><a href="descargar_notas">Descargar Notas</a></li>
            <li><a href="cierre.php">Salir</a></li>
    </ul>
  </nav>

    </header2>
  <!-- Fin Header 2 -->
    <div><img src="images/header/insc_cap_dest.jpg" width="100%" height="450"></div>

<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
	         <div class="Tablas" >
<div class="CSSTableGenerator" >

<table>
<?php

//Fin del Limite
$sql="SELECT * FROM usuarios ".$where;
$cons=mysqli_query($enlace, $sql);
echo '<table>
<tr>
<td>Nivel Capacitación Destino</td><td>Modulo</td><td>Profesor/a</td><td>Nota</td>
</tr>';
while($datos=mysqli_fetch_assoc($cons)){
$primario= $datos['cod_usu'];
echo "<tr>";
echo "<td><center>".$datos['cod_usu']."</center></td>";
echo "<td><center>".$datos['nom_usu']."</center></td>";
echo "<td><center>".$datos['ps_usu']."</center></td>";
echo "<td><center>".$datos['rps_usu']."</center></td>";
}
?>
                 </table>
            </div>

</div>
					<!-- /Content -->

				</div>

			</div>
		</div>
</div>

<!-- Footer -->
    <div id="footer">
      <div class="container">
        <div class="row">

          <img src="images/footer.png" width="500" height="350">

          <div class="6u">
            <section>
              <header>
                <h2>Restauración Mundial</h2>
              </header>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat laoreet eleifend. Duis dictum, nisi vitae hendrerit hendrerit, ipsum velit viverra mauris, sit amet eleifend metus ipsum eu magna. Aenean dignissim lorem neque, sit amet convallis ante suscipit et. Vivamus iaculis quam nec neque dignissim convallis. Nulla ullamcorper at enim ac euismod. Ut tristique tincidunt lacus, ac interdum ante mollis non. Ut tempus eget ante a facilisis.</p><br>
              <ul class="default">
                <li style="color:#FFF"><a href="#">Ubicación:</a> Calle Sánchez Carrero, entre Miranda y Páez, al frente de los Almacenes Generales de la Ovejita,Calle Sanchez Carrero,Maracay</li>
                <li style="color:#FFF">Teléfono: XXXXX-XXXXXXXXX-XXXXXXXXXXX</li>
                <li style="color:#FFF">Horarios de atención: XXXX - XXXXX</li>
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>
  <!-- Footer -->

</body>
</html>
