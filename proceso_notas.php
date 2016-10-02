<?php
$mensaje ="";  
include("conex.php");
if (isset($_POST['cargar_nota'])) {
	# code...

$codigo_nivel = $_POST['codigo_nivel'];
$modulo = $_POST['modulo'];
$evaluacion = $_POST['evaluacion'];
$ci_estudiante = $_POST['ci_estudiante'];
$nota = $_POST['nota'];
$dia=date("Y-m-d");
$sql_nivel = "SELECT * FROM nivel WHERE cod_nivel='$codigo_nivel'";
$consulta_nivel = mysqli_query($enlace, $sql_nivel);
$nivel_evaluado = mysqli_fetch_assoc($consulta_nivel);
for ($i=2; $i < 4; $i++) { 
	$x = $i-1;
	if ($nivel_evaluado['trimestre'] == "trimestre_$i") {
		$modulo = $modulo+(2*$x);
}
}
$modulo_final = "modulo_$modulo";
$sql = "SELECT * FROM usuarios_lideres where nom_usu = '".$_SESSION['nombre']."'";
$consulta_usuario = mysqli_query($enlace, $sql);
$usuario = mysqli_fetch_assoc($consulta_usuario);
$ci_lider = $usuario['ci_lider'];
$cargar_nota = "INSERT INTO notas_evaluaciones(cod_nota,asignatura,ci_est,ci_lider,cod_nivel,evaluacion,nota,fecha) VALUES ('','$modulo_final','$ci_estudiante','$ci_lider','$codigo_nivel','$evaluacion','$nota','$dia')";
if (mysqli_query($enlace, $cargar_nota)) {

	$mensaje= 'Nota cargada con éxito';
} else $mensaje= 'Error al cargar nota';
}
?>