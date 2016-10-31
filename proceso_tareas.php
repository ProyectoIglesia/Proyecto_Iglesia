<?php
$mensaje = "";
include("conex.php");
if (isset($_POST['cargar_tarea'])) {
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
	$sql_total_tareas = "SELECT * FROM notas_totales WHERE ci_est='$ci_estudiante' and cod_nivel='$codigo_nivel'";
	$consulta_total_tareas = mysqli_query($enlace, $sql_total_tareas);
	$total_tareas = mysqli_fetch_assoc($consulta_total_tareas);
	$cantidad_tareas = $total_tareas['tareas_entregadas_total'] + $tareas_entregadas;
	$sql_actualizacion_tareas = "UPDATE notas_totales SET tareas_entregadas_total='".$cantidad_tareas."' WHERE ci_est='$ci_estudiante' and cod_nivel='$codigo_nivel'";
	mysqli_query($enlace, $sql_actualizacion_tareas);
	$hora=date("h:i:s");
	$dia=date("Y-m-d");
	$usuario_audita = $_SESSION["nombre"];
	$accion = "Carga de devocional";
	$datosAuditoria = $codigo_nivel.', '.$ci_estudiante.', '.$ci_lider.', '.$semana.', '.$tareas_entregadas;
	$sql="INSERT INTO auditoria VALUES ('','$dia','$hora','$accion','$datosAuditoria','$usuario_audita')";
	mysqli_query($enlace, $sql);
} else $mensaje = "Error de carga";
include("comprobacion_estatus.php");
}
?>
