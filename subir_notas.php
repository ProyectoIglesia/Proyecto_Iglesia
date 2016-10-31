<?php
include("conex.php");
include("formulario.php");
include("proceso_notas.php");
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}
$sql = "SELECT * FROM usuarios_lideres where nom_usu = '".$_SESSION['nombre']."'";
$consulta_usuario = mysqli_query($enlace, $sql);
$usuario = mysqli_fetch_assoc($consulta_usuario);
$ci = $usuario['ci_lider'];
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
              				<li><a href="lider.php">Inicio</a></li>
                      <li><a href="tareas.php">Cargar Devocional</a></li>
                      <li><a href="grafica_nota2.php">Gráficos de notas</a></li>
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
									<h2>        <?php echo "<b>$mensaje</b>"; ?> </h2>
								</header><br>

                            <div class="Formularios" >
<form action="?m=1" method="post" name="form1" id="form1">
<table>
<tr>
<td align="right"><b>Seleccionar nivel(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td>
<?php
$sql_nivel = "SELECT * FROM nivel WHERE ci_lider='$ci'";
$consulta_nivel = mysqli_query($enlace, $sql_nivel);
echo "<select name='codigo_nivel'>";
while ($nivel = mysqli_fetch_assoc($consulta_nivel)) {
	echo "<option value='".$nivel['cod_nivel']."'> ".$nivel['trimestre']." ".$nivel['horario']." </option>";
}
  echo "</select>";
?>
</td>
</tr>
<tr>
<td align="right"><b>Módulo(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select name="modulo" required>
                        <option value="1">módulo 1</option>
                        <option value="2">módulo 2</option>
                          </select></td>
</tr>
<tr>
<td align="right"><b>Evaluación(<a>*</a>)</b></td>
<td>&nbsp;</td>
<!-- CODIGO TEMPORAL HACE FALTA VALIDAR EVALUACIONES DE FORMA AUTOMATICA  -->
<td><select name="evaluacion" id="niveles" required>
                        <option value="evaluacion_1">Evaluación 1</option>
                        <option value="evaluacion_2">Evaluación 2</option>
                        <option value="evaluacion_3">Evaluación 3</option>
                        <option value="evaluacion_4">Evaluación 4</option>
                        <option value="evaluacion_5">Evaluación 5</option>
                        <option value="evaluacion_6">Evaluación 6</option>
                        <option value="evaluacion_7">Evaluación 7</option>
                        <option value="evaluacion_8">Evaluación 8</option>
                        <option value="evaluacion_9">Evaluación 9</option>
                        <option value="evaluacion_10">Evaluación 10</option>
                          </select></td>
</tr>
<!-- FIN DEL CODIGO TEMPORAL -->
<tr>
<!-- CODIGO TEMPORAL HACE FALTA REEMPLAZARLO POR UN SELECT -->
<td align="right"><b>Indique la cédula del estudiante (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input type="number" name="ci_estudiante" required pattern="[0-9]+">
                          </td>
</tr>
<tr>
<td align="right"><b>Indique la nota del estudiante(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input type="number" min="0" max="100" name="nota" required>
                          </td>
</tr>
<tr>
    <td align="right"><input type="submit" name="cargar_nota" value="cargar nota"></td>
    <td width="5%">&nbsp;</td>
    <td><input name="res" type="reset" value="reestablecer"></td>
  </tr>
</table>
<a style="margin-left:440px;"><b> (<a>*</a>) : Campos Obligatios</b></a>

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
<h2>Reporte:</h2>
<td align="center"><a href="reporte/reporte_notas.php" target="_blank"><img src="images/PDF_Descargar.png" width="50" height="50" alt="" /></a></td>
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
$sql = "SELECT * FROM notas_evaluaciones ".$where;
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros =mysqli_num_rows($consulta);
$paginado = intval($cant_registros / $cantidad);
//hasta aqui es la consulta total de registros
$sql = "SELECT * FROM notas_evaluaciones ".$where." LIMIT $inicial,$cantidad ";
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros2 =mysqli_num_rows($consulta);
//hasta aqui es la consulta limitada
echo "</br><center>Cantidad de registros: ".$cant_registros." - Límite Mostrado: Del ".($inicial+1)." al ".($inicial + $cant_registros2)."</center><br>";
$sql="Select * from notas_evaluaciones ".$where;
$cons=mysqli_query($enlace, $sql);
echo '<table>
<tr>
<td>Código</td><td>Nivel</td><td>Módulo</td><td>Evaluación</td><td>Cédula estudiante</td><td>Nota</td><td>Fecha</td><td colspan="2">Opciones</td>
</tr>';
while($datos=mysqli_fetch_assoc($cons)){
$primario= $datos['cod_nota'];
echo "<tr>";
echo "<td><center>".$datos['cod_nota']."</center></td>";
echo "<td><center>".$datos['asignatura']."</center></td>";
echo "<td><center>".$datos['asignatura']."</center></td>";
echo "<td><center>".$datos['evaluacion']."</center></td>";
echo "<td><center>".$datos['ci_est']."</center></td>";
echo "<td><center>".$datos['nota']."</center></td>";
echo "<td><center>".$datos['fecha']."</center></td>";
echo "<td><center><a class='tooltip' alt='Eliminar Registro' href='?m=1&eliminar=$primario'><img src='images/eliminar.png'></a></center></td>";
echo "<td><center><a class='tooltip' alt='Editar Registro ' href='?m=1&editar=$primario'><img src='images/editar.png'></a></center></td>";
echo "</tr>";
}
echo "<tr align='center'><td colspan=9>";
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
