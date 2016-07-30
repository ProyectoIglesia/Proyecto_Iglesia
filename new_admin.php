<?php
include ("formulario_admin.php");
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

<body>
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
              <li><a href="new_admin.php">Registrar Administrador</a></li>
              <li><a href="new_trabajador.php">Registrar Trabajador</a></li>
              <li><a href="new_estudiante.php">Registrar Estudiante</a></li>
              <li><a href="reporte/pdf.php">Reportes PDF</a></li>
              <li><a href="cierre.php">Salir</a></li>
            </ul>
					</nav>

			</div>
		</div>

<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
						<div id="content" class="12u skel-cell-important">

								<header align="center">
									<h2>Formulario para datos de los <a style="color: red">Administradores</a></h2>
                  <br><?php echo $mensaje ?>
								</header><br>
                            <div class="Formularios" >

<form action="?m=1" method="post" name="form1" id="form1">
 <table width="80%" border="1" align="center" cellpadding="5" cellspacing="5">
  <tr>
    </tr>
  <tr>
    <td colspan="3" align="center"></td>
    </tr>
   <tr>
    <td align="right"><b>Codigo Adm.<b></td>
    <td>&nbsp;</td>
    <td width="45%"><input disabled style="width:85%; border-radius:5px" pattern="[0-9]+" type="text" name="cod_usu" id="cod_usu" placeholder="Automatico" <?php if(isset($edita)){
echo 'value="'.$datosEditar['cod_usu'].'"'; echo " disabled ";} ?>>
<?php if(isset($edita)) echo '<input name="codM" type="hidden"
value="'.$datosEditar['cod_usu'].'" />'; ?></td>
  </tr>
  <tr>
    <td align="right"><b>Usuario (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" type="text" required pattern="[a-z A-Z]+"
name="usuario" id="usuario" placeholder="Usuario del Administrador" <?php
if(isset($edita)) echo 'value="'.$datosEditar['nom_usu'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Contraseña (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" type="password" name="clave" id="clave" placeholder="Contraseña del administrador" <?php
if(isset($edita)) echo 'value="'.$datosEditar['cont_usu'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Pregunta de seguridad (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>

                        <td ><select name="ps" id="ps" id="ps" >
                        <option value="null">Selecciona una Pregunta</option>
                        <option value="Profesor Favorito">Quien fue su profesor favorito?</option>
                        <option value="personaje favorito">Quien es su personaje histórico favorito?</option>
                        <option value="Mejor Amigo">Quien fue su mejor amigo en la niñez?</option>
                        <option value="Lugar Favorito">Cual es su lugar favorito para visitar?</option>
                        <option value="Comida Preferida">Cual es su comida preferida?</option>
                        <option value="Pelicula Favorita">Cual es su película favorita?</option>
                        <option value="Grupo Favorito">Cual es su grupo de música favorito?</option>
                        <option value="Nombre de tu Mascota">Cual es el nombre de tu mascota?</option>
                        </select><?php if(isset($edita)) echo'<br><b> ('.$datosEditar['ps_usu'].')</b>'; ?></td>
                        </tr>
  <tr>
    <td align="right"><b>Respuesta Pregunta de seguridad (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" type="password"
name="rps" id="rps" placeholder="Respuesta Secreta" <?php
if(isset($edita)) echo 'value="'.$datosEditar['rps_usu'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><?php if(isset($edita)) $nom_boton="Modificar
Registro"; else $nom_boton="Enviar Registro"; ?><input name="button" type="submit" value="<?php echo $nom_boton ?>"></td>
    <td width="5%">&nbsp;</td>
    <td><input name="res" type="reset" value="reestablecer"></td>
  </tr>

</table>
<a style="margin-left:450px;"><b> (<a style="color:red">*</a>) : Campos Obligatios</b></a>

</form>
</div>

<div class="Consultas" align="center">
<table width="37%" border="1" cellspacing="5" cellpadding="5" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><form action="?m=1" method="post" name="form2">
Filtrado:
<select name="campos">
<option value="cod_usu" selected="selected">Codigo</option>
<option value="nom_usu">Nombres</option>
</select><input name="valor" type="text"><input name="Consultar" type="submit" value="Enviar"><td align="center"><a href="reporte/pdf.php"><img src="images/PDF_Descargar.png" width="50" height="50" alt="" /></a></td>
</form></td>
    <td>&nbsp;</td>
  </tr>
</table>


  </div>
         <div class="Tablas" >
<div class="CSSTableGenerator" >

<table>
<?php

if(isset($_REQUEST['valor'])){
$where = "Where ".$_REQUEST['campos']." like '%".$_REQUEST['valor']."%'";
$_SESSION['w']= $where;
}
if (!isset($_REQUEST['pg'])) $n_pag = 1; else $n_pag=$_REQUEST['pg'];
$cantidad=20;
$inicial = ($n_pag-1) * $cantidad;
//Fin del Limite
$sql = "SELECT * FROM usuarios ".$where;
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros =mysqli_num_rows($consulta);
$paginado = intval($cant_registros / $cantidad);
//hasta aqui es la consulta total de registros
$sql = "SELECT * FROM usuarios ".$where." LIMIT $inicial,$cantidad ";
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros2 =mysqli_num_rows($consulta);
//hasta aqui es la consulta limitada
echo "</br><center>Cantidad de registros: ".$cant_registros." - Límite Mostrado: Del ".($inicial+1)." al ".($inicial + $cant_registros2)."</center><br>";
$sql="SELECT * FROM usuarios ".$where;
$cons=mysqli_query($enlace, $sql);
echo '<table>
<tr>
<td>Codigo del Administrador</td><td>Usuario</td><td>Pregunta de Seguridad</td><td>Respuesta Pregunta de Seguridad</td><td colspan="2">Opciones</td>
</tr>';
while($datos=mysqli_fetch_assoc($cons)){
$primario= $datos['cod_usu'];
echo "<tr>";
echo "<td><center>".$datos['cod_usu']."</center></td>";
echo "<td><center>".$datos['nom_usu']."</center></td>";
echo "<td><center>".$datos['ps_usu']."</center></td>";
echo "<td><center>".$datos['rps_usu']."</center></td>";

echo "<td><center><a class='tooltip' alt='Eliminar Registro' href='?m=1&eliminar=$primario'><img src='images/eliminar.png'></a></center></td>";
echo "<td><center><a class='tooltip' alt='Editar Registro ' href='?m=1&editar=$primario'><img src='images/editar.png'></a></center></td>";
echo "</tr>";
}
echo "<tr align='center'><td colspan=6>";
for ($a=0;$a<($paginado+1);$a++){
echo '<a href="?pg='.($a+1).'">'.($a+1).'<a/>&nbsp;';
}
echo "</td></tr>";
?>
                 </table>
            </div>

</div>

						</div>
					<!-- /Content -->

				</div>

			</div>
		</div>
</div>



</body>
</html>
