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
for ($i=0; $i < 3; $i++) {
	if ($ultimo_nivel_aprobado == $i) {
		$x= $i + 1;
		if ($nivel == $x) {
			# codigo que permite registrarse
			$nivel = "trimestre_".$x;
			$sql_nivel = "SELECT * FROM nivel where trimestre = '".$nivel."'";
			$consulta_nivel = mysqli_query($enlace, $sql_nivel);
			while ($trimestres = mysqli_fetch_assoc($consulta_nivel)) {
				if ($trimestres['estatus_nivel'] == 'Abierto') {
					$codigo = $trimestres['cod_nivel'];
					$cantidad_estuantes = $trimestres['cantidad_estuantes'] + 1;
					$sql_actualiza_cantidad_estudiantes = "UPDATE nivel SET cantidad_estuantes+'".$cantidad_estuantes."' WHERE cod_nivel=".$codigo;
					mysqli_query($enlace, $sql_actualiza_cantidad_estudiantes);
				}
			}

		}
		else {
			# codigo que lo rebote
		}
	}
}
?>
