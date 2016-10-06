<?php
$mensaje ="";
include("conex.php");
if (isset($_POST['cargar_nota'])) {
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
	$nota_total_materia = $nota / 10;
	$sql_total_materia_actual = "SELECT * FROM notas_totales WHERE ci_est='$ci_estudiante' and cod_nivel='$codigo_nivel'";
	$consulta_total_materia_actual = mysqli_query($enlace, $sql_total_materia_actual);
	$total_materia_actual = mysqli_fetch_assoc($consulta_total_materia_actual);
	$nota_total_materia = $total_materia_actual['total_materia'.$modulo] + $nota_total_materia;
	$nota_total_materia2 = $nota_total_materia / 2;
	$total = $total_materia_actual['total_materias'] + $nota_total_materia2;
	$sql_cargar_total_materia = "UPDATE notas_totales SET total_materia".$modulo."='".$nota_total_materia."', total_materias='".$total."' where ci_est=$ci_estudiante and cod_nivel=$codigo_nivel";
	mysqli_query($enlace, $sql_cargar_total_materia);
} else $mensaje= 'Error al cargar nota';
include("comprobacion_estatus.php");
}
?>
