<?php
include("formulario.php");
include("agregar_nivel.php");
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
    	<link rel="stylesheet" href="css/fonts.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
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
              <li><a href="administrador.php">Inicio</a></li>
              <li><a href="new_lider.php">Registrar Líder</a></li>
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
                            <div align="center" class="Formularios" >
                            <?php echo "<b><center>$mensaje</center></b>"; ?>
<form action="?m=1" method="post" name="form1" id="form1">
<table>

<tr>
<td align="right"><b>Nivel a aperturar(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select style="border-radius:5px" name="niveles" id="niveles" required>
                        <option value="trimestre_1">Nivel 1</option>
                        <option value="trimestre_2">Nivel 2</option>
                        <option value="trimestre_3">Nivel 3</option>
                          </select></td>
</tr>
<tr>
<td align="right"><b>Horario (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select style="border-radius:5px" name="horarios" id="horarios" required>
                        <option value="horario 1">Turno 8:00 a.m. - 10:00 a.m.</option>
                        <option value="horario 2">Turno 10:00a.m. - 12:00 p.m.</option>
                          </select></td>
</tr>
<tr>
<td align="right"><b>Fecha de inicio(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input style="border-radius:5px" type="date" name="fecha_inicio" id="fecha_inicio" required></td>
</tr>
<tr>
<td align="right"><b>Fecha de fin(<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><input style="border-radius:5px" type="date" name="fecha_fin" id="fecha_fin" required></td>
</tr>
<tr>
<td align="right"><b>Selecciona lider (<a>*</a>)</b></td>
<td>&nbsp;</td>
<td><select style="border-radius:5px" name="ci_lider" required>
                          <?php
                          $sql_lider = "SELECT * FROM lideres";
                          $consulta_lideres =  mysqli_query($enlace,$sql_lider);
                          while($lideres = mysqli_fetch_assoc($consulta_lideres)){
                            $seleccionar_ci= $lideres['ci_lider'];
                            $seleccionar_nombre= $lideres['nom_lider'];
                            $seleccionar_apellido= $lideres['ape_lider'];
                              echo "<option value='".$seleccionar_ci."'> ".$seleccionar_nombre." ".$seleccionar_apellido."</option>";
                           }
                          ?>
                          </select></td>
</tr>
</table>
<center>

    <input style="margin-right: 20px;" class="boton" name="agregar" type="submit" value="Aperturar Cap. Destino">

<input style="margin-left:20px;" class="boton" name="res" type="reset" value="Reestablecer"></center>
<br>
<center><a><b> (<a style="color:red">*</a>) : Campos Obligatios</b></a></center>

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
<td align="center"><a href="reporte/pdf_niveles.php" target="_blank"><img src="images/PDF_Descargar.png" width="50" height="50" alt="" /></a></td>
</form></td>
    <td>&nbsp;</td>
  </tr>
</table>


  </div>

<br><br>

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
$sql = "SELECT * FROM nivel ".$where;
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros =mysqli_num_rows($consulta);
$paginado = intval($cant_registros / $cantidad);
//hasta aqui es la consulta total de registros
$sql = "SELECT * FROM nivel ".$where." LIMIT $inicial,$cantidad ";
$consulta = mysqli_query($enlace, $sql) or die ("Error");
$cant_registros2 =mysqli_num_rows($consulta);
//hasta aqui es la consulta limitada
echo "</br><center>Cantidad de registros: ".$cant_registros." - Límite Mostrado: Del ".($inicial+1)." al ".($inicial + $cant_registros2)."</center><br>";
$sql="Select * from nivel ".$where;
$cons=mysqli_query($enlace, $sql);
echo '<table>
<tr>
<td>Código</td><td>Nivel</td><td>Horario</td><td>Lider</td><td>Fecha inicio</td><td>Fecha fin</td><td>Estatus</td><td colspan="2">Opciones</td>
</tr>';
while($datos=mysqli_fetch_assoc($cons)){
$primario= $datos['cod_nivel'];
echo "<tr>";
echo "<td><center>".$datos['cod_nivel']."</center></td>";
echo "<td><center>".$datos['trimestre']."</center></td>";
echo "<td><center>".$datos['horario']."</center></td>";
echo "<td><center>".$datos['ci_lider']."</center></td>";
echo "<td><center>".$datos['fech_inicio']."</center></td>";
echo "<td><center>".$datos['fech_final']."</center></td>";
echo "<td><center>".$datos['estatus_nivel']."</center></td>";
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
