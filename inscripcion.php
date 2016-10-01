<?php
include("conex.php");
session_start();
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}
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
         								<option value="turno_1">turno 8:00 a 10:00 am</option>
         								<option value="turno_2">turno 10:00 am a 12:00 pm</option>
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
else echo "Ya estas inscrito";
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
</html>
<?php
$mensaje ="";
if (isset($_POST['inscribirse'])) {
	$nivel = $_POST['niveles'];
$horario = $_POST['horarios'];
$sql_estudiante = "SELECT * FROM estudiantes where ci_est = '".$ci."'";
$consulta_estudiante = mysqli_query($enlace, $sql_estudiante);
$estudiante = mysqli_fetch_assoc($consulta_estudiante);
$ultimo_nivel_aprobado = $estudiante['ultimo_nivel_aprobado'];
for ($i=0; $i < 3; $i++) {
	if ($ultimo_nivel_aprobado == $i) {
		$x= $i + 1;
		$z= "nivel_$x";
		if ($nivel == $z) {
			# codigo que permite registrarse
			$nivel = "trimestre_".$x;
			$sql_nivel = "SELECT * FROM nivel where trimestre = '".$nivel."'";
			$consulta_nivel = mysqli_query($enlace, $sql_nivel);
			while ($trimestres = mysqli_fetch_assoc($consulta_nivel)) {
				if ($trimestres['estatus_nivel'] == 'Abierto') {
					$codigo = $trimestres['cod_nivel'];
					$lider = $trimestres['ci_lider'];
					$fecha_inicio = $trimestres['fech_inicio'];
					$fecha_final = $trimestres['fech_final'];
					$estatus_nivel = $trimestres['estatus_nivel'];
					$horario = $trimestres['horario'];
					$cantidad_estudiantes = $trimestres['cantidad_estudiantes'] + 1;
					$sql_actualiza_cantidad_estudiantes = "UPDATE nivel SET cantidad_estudiantes='$cantidad_estudiantes' WHERE cod_nivel='".$codigo."'";
					mysqli_query($enlace, $sql_actualiza_cantidad_estudiantes);
					$sql_inscripcion = "INSERT INTO inscripcion (cod_inscripcion,ci_est,cod_nivel,trimestre,ci_lider,fech_inicio,fech_final,estatus_nivel, horario) VALUES ('','$ci','$codigo','$nivel','$lider','$fecha_inicio','$fecha_final','$estatus_nivel','$horario')";
					if(mysqli_query($enlace, $sql_inscripcion)){
						$mensaje= '<b>Registro Satisfactorio.</b>';
					}
					else $mensaje= '<b>Error al registrar</b>';

				}
			}


		}
		else {
			# codigo que lo rebote
		}
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.1;URL=inscripcion.php'>";
	}
}
}
?>
