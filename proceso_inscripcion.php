<?php

include ('conex.php');
session_start();
$nivel = $_POST['niveles'];
$horario = $_POST['horarios'];
$sql = "SELECT * FROM usuarios_estudiantes where nom_usu = '".$_SESSION['nombre']."'";
$consulta_usuario = mysqli_query($enlace, $sql);
$usuario = mysqli_fetch_assoc($consulta_usuario);
$ci = $usuario['ci_est'];
$sql_estudiante = "SELECT * FROM estudiantes where ci_est = '".$ci."'";
$consulta_estudiante = mysqli_query($enlace, $sql_estudiante);
$estudiante = mysqli_fetch_assoc($consulta_estudiante);
$ultimo_nivel_aprobado = $estudiante['ultimo_nivel_aprobado'];
if ($ultimo_nivel_aprobado == 0) {
	if ($nivel > 1) {
		# codigo que lo rebote
	}
	else{
		# codigo que permite registrarse
		$nivel = 'trimestre_1';
		$sql_nivel = "SELECT * FROM nivel where trimestre = '".$nivel."'";
		$consulta_nivel = mysqli_query($enlace, $sql_nivel);
		while ($trimestres = mysqli_fetch_assoc($consulta_nivel)) {
			if ($trimestres['estatus_nivel'] == 'Abierto') {
				
				

			}
		};

	}

}
elseif ($ultimo_nivel_aprobado == 1) {
	if ($nivel == 2) {
		# te deja registrarte
		$nivel = 'trimestre_2';
	}
	else{
		#te jodes
	}
}
elseif ($ultimo_nivel_aprobado == 2) {
	if ($nivel == 3) {
		# te deja registrarte
		$nivel = 'trimestre_3';
	}
	else{
		#te jodes
	}
}
else {

	echo "no se que haces aqui todavia!";

}
?>