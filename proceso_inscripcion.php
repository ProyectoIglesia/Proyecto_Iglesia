<?php
include('conex.php');
$mensaje ="";
if (isset($_POST['inscribirse'])) {
	$nivel = $_POST['niveles'];
$horario_inscrito = $_POST['horarios'];
$sql_estudiante = "SELECT * FROM estudiantes where ci_est='".$ci."'";
$consulta_estudiante = mysqli_query($enlace, $sql_estudiante);
$estudiante = mysqli_fetch_assoc($consulta_estudiante);
$ultimo_nivel_aprobado = $estudiante['ultimo_nivel_aprobado'];
for ($i=0; $i < 3; $i++) {
	if ($ultimo_nivel_aprobado == $i) {
		$x= $i + 1;
		$z= "nivel_$x";
		if ($nivel == $z) {
			# codigo que permite registrarse
			$nivel = "trimestre_".$x;
			$sql_nivel = "SELECT * FROM nivel where trimestre = '".$nivel."' and horario='$horario_inscrito'";
			$consulta_nivel = mysqli_query($enlace, $sql_nivel);
			while ($trimestres = mysqli_fetch_assoc($consulta_nivel)) {
				if ($trimestres['estatus_nivel'] == 'Abierto') {
					$codigo = $trimestres['cod_nivel'];
					$lider = $trimestres['ci_lider'];
					$fecha_inicio = $trimestres['fech_inicio'];
					$fecha_final = $trimestres['fech_final'];
					$estatus_nivel = $trimestres['estatus_nivel'];
					$cantidad_estudiantes = $trimestres['cantidad_estudiantes'] + 1;
					$sql_actualiza_cantidad_estudiantes = "UPDATE nivel SET cantidad_estudiantes='$cantidad_estudiantes' WHERE cod_nivel='".$codigo."'";
					mysqli_query($enlace, $sql_actualiza_cantidad_estudiantes);
					$sql_inscripcion = "INSERT INTO inscripcion (cod_inscripcion,ci_est,cod_nivel,trimestre,ci_lider,fech_inicio,fech_final,estatus_nivel, horario) VALUES ('','$ci','$codigo','$nivel','$lider','$fecha_inicio','$fecha_final','$estatus_nivel','$horario_inscrito')";
					if(mysqli_query($enlace, $sql_inscripcion)){
						$sql_notas_totales = "INSERT INTO notas_totales (cod_nota,total_materia1,total_materia2,total_materias,tareas_entregadas_total,ci_est,ci_lider,cod_nivel,estatus) VALUES ('','0','0','0','0','$ci','$lider','$codigo','Reprobado')";
						if (mysqli_query($enlace, $sql_notas_totales)) {
							$mensaje= '<b>Registro Satisfactorio.</b>';
						}
					}
					else $mensaje= '<b>Error al registrar</b>';

				}
			}


		}
		else {
			# codigo que lo rebote
		}
	}
}
}?>
