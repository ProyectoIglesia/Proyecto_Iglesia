<?php

//codigo de inserción de datos//
$mensaje ="";
include("conex.php");
if(isset($_POST['ci'])){
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$cedula = $_POST['ci'];
$nivelcp = $_POST['niv_cap_dest'];
$email = $_POST['email'];
$sql = "INSERT INTO estudiantes(ci_est,nom_est,ape_est,niv_cap_dest,corr_est) VALUES
($cedula, '$nombre','$apellido', '$nivelcp', '$email')";
if(mysqli_query($enlace, $sql)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.",
".$nivelcp.", ".$email;
}else $mensaje= '<b>Error al registrar</b>';
}
//fin del código//
?>