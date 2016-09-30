<?php
//codigo de inserción de datos//
include("conex.php");
$mensaje= "";
if(isset($_POST['ci'])){
$cedula = $_POST['ci'];
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$fn = $_POST['fec_nac'];
$direccion = $_POST['dir'];
$telefono = $_POST['tel'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$sql = "INSERT INTO lideres(ci_lider,nom_lider,ape_lider,fec_nac_lider,dir_lider,tel_lider,corr_lider,car_lider) VALUES
($cedula, '$nombre','$apellido', '$fn', '$direccion', '$telefono', '$email', '$cargo')";
if(mysqli_query($enlace, $sql)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$cargo;
}else $mensaje= '<b>Error al registrar</b>';
}
//fin del código//

//código de eliminación//
if(isset($_REQUEST['eliminar'])){
$sql= "DELETE FROM lideres WHERE
ci_lider=".$_REQUEST['eliminar'];
if(mysqli_query($enlace, $sql)) {
$mensaje= '<b>Registro Eliminado Satisfactoramente.</b>';
$accion="Eliminar";
$datosAuditoria=$_REQUEST['eliminar'];
}else $mensaje= '<b>Error al Eliminar</b>';
}
//fin del código//

//código de modificación//
if(isset($_POST['cedM'])){
$cedula = $_POST['cedM'];
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$fn = $_POST['fec_nac'];
$direccion = $_POST['dir'];
$telefono = $_POST['tel'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$sql= "UPDATE lideres SET nom_lider='$nombre', ape_lider='$apellido', fec_nac_lider='$fn', dir_lider='$direccion', tel_lider='$telefono', corr_lider='$email', car_lider='$cargo' where ci_lider=$cedula";
if(mysqli_query($enlace, $sql)){
$mensaje= '<b>Registro Modificado Satisfactoramente.</b>';
$accion="Modificar";
$datosAuditoria=$cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$cargo;
}else $mensaje= '<b>Error al Modificar</b>';
}
//fin del código//

//Código para mostrar datos a Modificar//
if(isset($_REQUEST['editar'])){
$sql= "SELECT * FROM lideres WHERE
ci_lider=".$_REQUEST['editar'];
$consultaDatos= mysqli_query($enlace, $sql);
$datosEditar=mysqli_fetch_assoc($consultaDatos);
$edita="si";
}
//fin del código//

//codigo de auditoria//
if(isset($accion)){
$hora=date("h:i:s");
$dia=date("Y-m-d");
$sql="INSERT INTO auditoria VALUES
('','$dia','$hora','$accion','$datosAuditoria')";
mysqli_query($enlace, $sql);
}
$where="";
//fin del código//


?>
