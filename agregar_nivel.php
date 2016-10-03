<?php
$mensaje ="";
include("conex.php");
include("formulario.php");
if (isset($_POST['agregar'])) {
	$nivel = $_POST['niveles'];
	$horario = $_POST['horarios'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];
	$ci_lider = $_POST['ci_lider'];
	$sql_validar = "SELECT * FROM nivel WHERE trimestre='".$nivel."' and estatus_nivel='Abierto' and horario='$horario'" ;
	$consulta_validar = mysqli_query($enlace, $sql_validar);
	$cantidad = mysqli_num_rows($consulta_validar);
	if ($cantidad > 0){
		$mensaje = "Este nivel ya está aperturado";
	}
	else {
	$sql = "INSERT INTO nivel (cod_nivel,trimestre,ci_lider,cantidad_estudiantes,fech_inicio,fech_final,estatus_nivel,horario) VALUES ('','$nivel','$ci_lider','0','$fecha_inicio','$fecha_fin','Abierto','$horario')";
	if(mysqli_query($enlace, $sql)){
		$mensaje = "Registro satisfactorio";
	}
	else $mensaje = "Error!";

  }  
 }
?>