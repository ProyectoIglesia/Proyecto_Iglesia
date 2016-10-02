<?php
include("conex.php");
session_start();
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}
include("proceso_inscripcion.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Centro Cristiano Restauración Mundial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
					<div id="logo">
						<h1 style="font-size:72px">Centro Cristiano</h1>
						<h1 style="font-size:36px; margin-top:30px; color:#CCC">Restauración Mundial</h1>

					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="estudiante.php">Inicio</a></li>
							<li><a href="#">Descargas</a></li>
							<li><a href="#">Perfil</a></li>
							<li><a href="cierre.php">Salir</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->

	<!-- Main -->
		<div id="main">
		<?php
		$sql = "SELECT * FROM usuarios_estudiantes where nom_usu = '".$_SESSION['nombre']."'";
$consulta_usuario = mysqli_query($enlace, $sql);
$usuario = mysqli_fetch_assoc($consulta_usuario);
$ci = $usuario['ci_est'];
$sql_revision = "SELECT * FROM inscripcion where ci_est = $ci";
$revision = mysqli_query($enlace, $sql_revision);
$permiso = "Si";
	while ($usuarios_inscritos = mysqli_fetch_assoc($revision)) {
	if ($usuarios_inscritos['estatus_nivel'] == 'Abierto' or $usuarios_inscritos['estatus_nivel'] == 'En_curso') {
		$permiso = "No";
	}
	else $permiso = "Si";
}
		if ($permiso == 'Si') {
		echo '
			<h2><b>'.$mensaje.'</b></h2>
			<div class="Formularios" >
<form action="" method="post" name="form1" id="form1">
<table>

<tr>
<td align="right"><b>Nivel de capacitación destino(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select name="niveles" id="niveles" required>
         								<option value="nivel_1">Nivel 1</option>
         								<option value="nivel_2">Nivel 2</option>
         								<option value="nivel_3">Nivel 3</option>
                					</select></td>
</tr>
<tr>
<td align="right"><b>Horario (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select name="horarios" id="horarios" required>
         								<option value="horario 1">turno 8:00 a 10:00 am</option>
         								<option value="horario 2">turno 10:00 am a 12:00 pm</option>
                					</select></td>
</tr>
<tr>
    <td align="right"><input type="submit" name="inscribirse" value="inscribirse"></td>
    <td width="5%">&nbsp;</td>
    <td><input name="res" type="reset" value="reestablecer"></td>
  </tr>
</table>
<a style="margin-left:440px;"><b> (<a>*</a>) : Campos Obligatios</b></a>

</form>
</div>';
}
else echo "<h2><b>Ya estas inscrito</b></h2>";
?>
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
