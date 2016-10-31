<?php
include ("formulario.php");
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
		<link rel="shortcut icon" href="images/favicon.png">
		<link rel="stylesheet" href="css/fonts.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<link rel="stylesheet" type="text/css" href="engine1/style_slider.css" />
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<script type="text/javascript">
        <?php 
        $sql_nivel = "SELECT * FROM nivel WHERE cod_nivel='".$codigo_nivel."'";
        $consulta_nivel = mysqli_query($enlace, $sql_nivel);
        $nivel = mysqli_fetch_assoc($consulta_nivel);
        if($nivel['trimestre'] == "trimestre_1"){
            $trimestre = 1;
        }
        elseif($nivel['trimestre'] == "trimestre_2"){
            $trimestre = 2;
        }
        else{
            $trimestre = 3;
        }
        if($nivel['horario'] == "horario 1"){
            $horario = 1;
        }
        else{
            $horario = 2;
        }
        ?>       
$(function () {
    $('#container').highcharts({
        title: {
           <?php echo "text: 'Notas de estudiantes, Nivel ".$trimestre."  Turno ".$horario."'," ?>
            x: -20 //center
        },
        subtitle: {
            <?php echo "text: ' Periodo ".$nivel['fech_inicio']." - ".$nivel['fech_final']."'," ?>
            x: -20
        },
        xAxis: {
            categories: ['Evaluación 1', 'Evaluación 2', 'Evaluación 3', 'Evaluación 4', 'Evaluación 5', 'Evaluación 6',
                'Evaluación 7', 'Evaluación 8', 'Evaluación 9', 'Evaluación 10']
        },
        yAxis: {
            title: {
                text: 'Notas'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' /100'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
        <?php  
            for ($i=0; $i < 10; $i++) { 
                $imprime[$i] = 0;
                $imprime2[$i] = 0;
            }
                $sql_grafica_nota = "SELECT * FROM notas_evaluaciones WHERE cod_nivel='".$codigo_nivel."' and asignatura='modulo_1'";
                $consulta_grafica_nota = mysqli_query($enlace, $sql_grafica_nota);
                while ($notas=mysqli_fetch_assoc($consulta_grafica_nota)) {
                    for ($i = 0 ; $i < 10 ; $i++) {
                        if(isset($notas['evaluacion'])){
                            $imprime[$i] += $notas['nota'] / 10;
                            $i += 10;
                        }
                        else{
                            $imprime[$i] += 0;
                        }
                    }
                }
                $sql_grafica_nota2 = "SELECT * FROM notas_evaluaciones WHERE cod_nivel='".$codigo_nivel."' and asignatura='modulo_2'";
                $consulta_grafica_nota2 = mysqli_query($enlace, $sql_grafica_nota2);
                while ($notas=mysqli_fetch_assoc($consulta_grafica_nota2)) {
                    for ($i = 0 ; $i < 10 ; $i++) {
                        if(isset($notas['evaluacion'])){
                            $imprime2[$i] += $notas['nota'] / 10;
                            $i += 10;
                        }
                        else{
                            $imprime2[$i] += 0;
                        }
                    }
                }    
                for ($i=1; $i <= 10; $i++) { 
                    $sql_grafica_final = "UPDATE * FROM grafica set prueba_$i = '".$imprime[$i - 1]."' WHERE materia='materia_1'";
                    $consulta_grafica_final = mysqli_query($enlace, $sql_grafica_final);
                    echo "HOLA";
                }
                for ($i=1; $i <= 10; $i++) { 
                    $sql_grafica_final = "UPDATE * FROM grafica set prueba_$i = '".$imprime2[$i - 1]."' WHERE materia='materia_2'";
                    $consulta_grafica_final = mysqli_query($enlace, $sql_grafica_final);
                }
                $sql_imprime_grafica = "SELECT * FROM grafica WHERE materia='materia_1'";
                $consulta_imprime_grafica = mysqli_query($enlace, $sql_imprime_grafica);
                $grafica_final_1 = mysqli_fetch_assoc($consulta_imprime_grafica);
                $sql_imprime_grafica = "SELECT * FROM grafica WHERE materia='materia_2'";
                $consulta_imprime_grafica = mysqli_query($enlace, $sql_imprime_grafica);
                $grafica_final_2 = mysqli_fetch_assoc($consulta_imprime_grafica);
            echo "{ name: 'Modulo 1', ";
            echo "data: [". $grafica_final_1['prueba_1'].", ". $grafica_final_1['prueba_2'].", ". $grafica_final_1['prueba_3'].", ". $grafica_final_1['prueba_4'].", ". $grafica_final_1['prueba_5'].", ". $grafica_final_1['prueba_6'].", ". $grafica_final_1['prueba_7'].", ". $grafica_final_1['prueba_8'].", ". $grafica_final_1['prueba_9'].", ". $grafica_final_1['prueba_10']."] },";
            echo "{ name: 'Modulo 2', ";
            echo "data: [". $grafica_final_2['prueba_1'].", ". $grafica_final_2['prueba_2'].", ". $grafica_final_2['prueba_3'].", ". $grafica_final_2['prueba_4'].", ". $grafica_final_2['prueba_5'].", ". $grafica_final_2['prueba_6'].", ". $grafica_final_2['prueba_7'].", ". $grafica_final_2['prueba_8'].", ". $grafica_final_2['prueba_9'].", ". $grafica_final_2['prueba_10']."] }";
        ?>
        ]
    });
});	
	</script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
	</head>
	<body class="homepage">

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
				<li><a href="lider.php">Inicio</a></li>
				<li><a href="subir_notas.php">Cargar notas</a></li>
				<li><a href="tareas.php">Cargar devocional</a></li>
				<li><a href="cierre.php">Salir</a></li>
			</ul>
		</nav>
	</div>
</div>
<?php
echo "<h2 id='TituloGrafica'>Escoja un nivel</h2>";
echo "<form action='?m=1' method='post' name='form1' id='FormularioGrafica'>";
$sql_nivel = "SELECT * FROM nivel";
$consulta_nivel = mysqli_query($enlace, $sql_nivel);
echo "<select name='codigo_nivel' required>";
while ($nivel = mysqli_fetch_assoc($consulta_nivel)) {
    echo "<option value='".$nivel['cod_nivel']."'> ".$nivel['trimestre']." ".$nivel['horario']."</option>";
}
echo "</select><br/>";
echo '<input type="submit" name="cargar_grafica" value="Cargar Grafica">';
if (isset($_POST['codigo_nivel'])) {
    echo '<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
}
?>
</body>
</html>
