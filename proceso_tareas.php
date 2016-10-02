<?php 
$mensaje = "";
include("conex.php");
if (isset($_POST['cargar_tarea'])) {
	# code...

$codigo_nivel = $_POST['codigo_nivel'];
$ci_estudiante = $_POST['ci_estudiante'];
$sql = "SELECT * FROM usuarios_lideres where nom_usu = '".$_SESSION['nombre']."'";
$consulta_usuario = mysqli_query($enlace, $sql);
$usuario = mysqli_fetch_assoc($consulta_usuario);
$ci_lider = $usuario['ci_lider'];
$tareas_entregadas = $_POST['tareas_entregadas'];
$sql_semana = "SELECT * FROM tareas WHERE ci_est='$ci_estudiante' and cod_nivel='$codigo_nivel'";
$consulta_semana = mysqli_query($enlace, $sql_semana);
$cantidad_semana = mysqli_num_rows($consulta_semana);
$cantidad_semana = $cantidad_semana +1;
$semana = "semana ".$cantidad_semana;
$sql_tarea = "INSERT INTO tareas(cod_tarea,cod_nivel,ci_est,ci_lider,semana,tareas_entregadas) VALUES ('','$codigo_nivel','$ci_estudiante','$ci_lider','$semana','$tareas_entregadas')";
if (mysqli_query($enlace,$sql_tarea)) {
	$mensaje = "Tarea cargada exitosamente";
} else $mensaje = "Error de carga";
}
?>