<?php
include ("formulario.php");
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
							<li><a href="lider.php">Inicio</a></li>
							<li><a href="subir_notas.php">Cargar notas</a></li>
							<li><a href="cierre.php">Salir</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->

	<!-- Main -->
		<div id="main">
			<div class="Formularios" >
<form action="?m=1" method="post" name="form1" id="form1">
<table>
<tr>
<td align="right"><b>Cedula (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td width="60%"><input class="entrada_grande" required pattern="[0-9]+" type="text"
name="ci" id="ci" placeholder="Cedula del Estudiante" <?php if(isset($edita)){
echo 'value="'.$datosEditar['ci_est'].'"'; echo " disabled ";} ?>>
<?php if(isset($edita)) echo '<input name="cedM" type="hidden"
value="'.$datosEditar['ci_est'].'" />'; ?></td>
</tr>
<tr>
<td align="right"><b>Nombres (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" type="text" required pattern="[a-z A-Z]+"
name="nom" id="nom" placeholder="Nombre completo del Estudiante" <?php
if(isset($edita)) echo 'value="'.$datosEditar['nom_est'].'"'; ?>></td>
</tr>
<tr>
<td align="right"><b>Apellidos (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" required pattern="[a-z A-Z]+" type="text"
name="ape" id="ape" placeholder="Apellido completo del Estudiante" <?php
if(isset($edita)) echo 'value="'.$datosEditar['ape_est'].'"'; ?>></td>
</tr>
<tr>
<td align="right"><b>Direccion (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" type="text" required name="dir" id="dir" placeholder="Direccion completa del Estudiante" <?php
if(isset($edita)) echo 'value="'.$datosEditar['dir_est'].'"'; ?>></td>
</tr>
<tr>
<td align="right"><b>Telefono (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" required pattern="[0-9]+" type="text" name="tel"
id="tel" placeholder="Telefono del estudiante" <?php if(isset($edita)) echo
'value="'.$datosEditar['tel_est'].'"'; ?>></td>
</tr>
<tr>
<td align="right"><b>Fecha de nacimiento (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" required type="date" name="fec_nac"
id="fec_nac" <?php if(isset($edita)) echo
'value="'.$datosEditar['fec_nac_est'].'"'; ?>></td>
</tr>
<tr>
<td align="right"><b>Correo (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input class="entrada_grande" required type="email" name="email"
id="email" placeholder="Correo del estudiante" <?php if(isset($edita)) echo
'value="'.$datosEditar['corr_est'].'"'; ?>></td>
</tr>
<tr>
<td><?php if(isset($edita)) $nom_boton="Modificar
Registro"; else $nom_boton="Enviar Registro"; ?><input class="boton" name="button" type="submit" value="<?php echo $nom_boton ?>">
&nbsp;<input class="boton" name="res" type="reset" value="reestablecer"></td>
</tr>
</table>
<a style="margin-left:440px;"><b> (<a>*</a>) : Campos Obligatios</b></a>

</form>
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
