<?php  
	include("conex.php");
	$sql_estatus = "SELECT * FROM notas_totales WHERE ci_est='$ci_estudiante' and cod_nivel='$codigo_nivel'";
	$consulta_estatus = mysqli_query($enlace, $sql_estatus);
	$estatus = mysqli_fetch_assoc($consulta_estatus);
	if ($estatus['total_materia1'] > 50 and $estatus['total_materia2'] > 50 and $estatus['tareas_entregadas_total'] > 60) {
		$sql_cambio_estatus = "UPDATE notas_totales SET estatus='Aprobado'";
	}else {
		$sql_cambio_estatus = "UPDATE notas_totales SET estatus='Reprobado'";
	} 
			mysqli_query($enlace,$sql_cambio_estatus);		

?>