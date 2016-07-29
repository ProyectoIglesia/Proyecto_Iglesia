<?php
include ("formulario_trabajador.php");
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
              <li><a href="new_trabajador">Registrar Trabajador</a></li>
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
									<h2>Formulario para datos de los <a style="color: green">Trabajadores</a></h2>
                  <br><?php echo $mensaje ?>
								</header><br>
                <div class="Formularios" >
<form action="?m=1" method="post" name="form1" id="form1">
 <table width="75%" border="1" align="center" cellpadding="5" cellspacing="5">
  <tr>
    </tr>
  <tr>
    <td colspan="3" align="center"></td>
    </tr>
  <tr>
    <td width="50%" align="right"><b>Cedula (<a style="color:red">*</a>)</b></td>
    <td width="8%">&nbsp;</td>
    <td width="60%"><input style="width:85%; border-radius:5px" required pattern="[0-9]+" type="text"
name="ci" id="ci" placeholder="Cedula del trabajador" <?php if(isset($edita)){
echo 'value="'.$datosEditar['ci_tra'].'"'; echo " disabled ";} ?>>
<?php if(isset($edita)) echo '<input name="cedM" type="hidden"
value="'.$datosEditar['ci_tra'].'" />'; ?></td>
  </tr>
  <tr>
    <td align="right"><b>Nombres (<a style="color:red">*</a>)</td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" type="text" required pattern="[a-z A-Z]+"
name="nom" id="nom" placeholder="Nombres completos del trabajador" <?php
if(isset($edita)) echo 'value="'.$datosEditar['nom_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Apellidos (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" required pattern="[a-z A-Z]+" type="text"
name="ape" id="ape" placeholder="Apellidos completos del trabajador" <?php
if(isset($edita)) echo 'value="'.$datosEditar['ape_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Fecha de nacimiento (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:55%; border-radius:5px" required type="date" name="fec_nac"
id="fec_nac" <?php if(isset($edita)) echo
'value="'.$datosEditar['fec_nac_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Direccion (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:95%; border-radius:5px" type="text" required name="dir" id="dir" placeholder="Direccion completa del trabajador" <?php
if(isset($edita)) echo 'value="'.$datosEditar['dir_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Telefono (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:55%; border-radius:5px" required pattern="[0-9]+" type="text" name="tel" id="tel" placeholder="Telefono del trabajador" <?php if(isset($edita)) echo
'value="'.$datosEditar['tel_tra'].'"'; ?>></td>
  </tr>
    <tr>
    <td align="right"><b>Correo (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:55%; border-radius:5px;" required type="email" name="email"
id="email" placeholder="Correo del trabajador" <?php if(isset($edita)) echo
'value="'.$datosEditar['corr_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><b>Cargo (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:55%; border-radius:5px;" required type="text" name="cargo"
id="cargo" placeholder="Cargo del trabajador" <?php if(isset($edita)) echo
'value="'.$datosEditar['car_tra'].'"'; ?>></td>
  </tr>
  <tr>
    <td align="right"><?php if(isset($edita)) $nom_boton="Modificar
Registro"; else $nom_boton="Enviar Registro"; ?><input style="margin-top:20px;" name="button" type="submit" value="<?php echo $nom_boton ?>"></td>
    <td width="5%">&nbsp;</td>
    <td><input name="res" type="reset" value="reestablecer"></td>
  </tr>
</table>
<a style="margin-left:430px;"><b> (<a style="color:red">*</a>) : Campo Obligatio</b></a>

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
<option value="ci_tra" selected="selected">Cedula</option>
<option value="nom_tra">Nombres</option>
<option value="ape_tra">Apellidos</option>
</select><input name="valor" type="text"><input name="Consultar" type="submit" value="Enviar"><td align="center"><a href="reportes/reportes.php"><img src="images/PDF_Descargar.png" width="50" height="50" alt="" /></a></td>
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
$sql = "SELECT * FROM trabajadores ".$where;
$consulta = mysql_query($sql,$enlace) or die ("Error");
$cant_registros =mysql_num_rows($consulta);
$paginado = intval($cant_registros / $cantidad);
//hasta aqui es la consulta total de registros
$sql = "SELECT * FROM trabajadores ".$where." LIMIT $inicial,$cantidad ";
$consulta = mysql_query($sql,$enlace) or die ("Error");
$cant_registros2 =mysql_num_rows($consulta);
//hasta aqui es la consulta limitada
echo "</br><center>Cantidad de registros: ".$cant_registros." - Límite Mostrado: Del ".($inicial+1)." al ".($inicial + $cant_registros2)."</center><br>";
$sql="Select * from trabajadores ".$where;
$cons=mysql_query($sql,$enlace);
echo '<table>
<tr>
<td>Cédula</td><td>Nombres</td><td>Apellidos</td><td>Fecha Nac.</td><td>Direccion</td><td>Telefono</td><td>Correo</td><td>Cargo</td><td colspan="2">Opciones</td>
</tr>';
while($datos=mysql_fetch_assoc($cons)){
$primario= $datos['ci_tra'];
echo "<tr>";
echo "<td><center>".$datos['ci_tra']."</center></td>";
echo "<td><center>".$datos['nom_tra']."</center></td>";
echo "<td><center>".$datos['ape_tra']."</center></td>";
echo "<td><center>".$datos['fec_nac_tra']."</center></td>";
echo "<td><center>".$datos['dir_tra']."</center></td>";
echo "<td><center>".$datos['tel_tra']."</center></td>";
echo "<td><center>".$datos['corr_tra']."</center></td>";
echo "<td><center>".$datos['car_tra']."</center></td>";
echo "<td><center><a class='tooltip' alt='Eliminar Registro' href='?m=1&eliminar=$primario'><img src='images/eliminar.png'></a></center></td>";
echo "<td><center><a class='tooltip' alt='Editar Registro ' href='?m=1&editar=$primario'><img src='images/editar.png'></a></center></td>";
echo "</tr>";
}
echo "<tr align='center'><td colspan=10>";
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