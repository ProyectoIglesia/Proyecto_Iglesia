<?php
//codigo de inserción de datos//
$mensaje ="";
include("conex.php");
if(isset($_POST['ci'])){
$cedula = $_POST['ci'];
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$fn = $_POST['fec_nac'];
$direccion = $_POST['dir'];
$telefono = $_POST['tel'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$sql = "INSERT INTO trabajadores(ci_tra,nom_tra,ape_tra,fec_nac_tra,dir_tra,tel_tra,corr_tra,car_tra) VALUES
($cedula, '$nombre','$apellido', '$fn', '$direccion', '$telefono', '$email', '$cargo')";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$cargo;
}else $mensaje= '<b>Error al registrar</b>';
}
//fin del código//

//código de eliminación//
if(isset($_REQUEST['eliminar'])){
$sql= "DELETE FROM trabajadores WHERE
ci_tra=".$_REQUEST['eliminar'];
if(mysql_query($sql,$enlace)) {
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
$sql= "UPDATE trabajadores SET nom_tra='$nombre', ape_tra='$apellido', fec_nac_tra='$fn', dir_tra='$direccion', tel_tra='$telefono', corr_tra='$email', car_tra='$cargo' where ci_tra=$cedula";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Modificado Satisfactoramente.</b>';
$accion="Modificar";
$datosAuditoria=$cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$cargo;
}else $mensaje= '<b>Error al Modificar</b>';
}
//fin del código//

//Código para mostrar datos a Modificar//
if(isset($_REQUEST['editar'])){
$sql= "SELECT * FROM trabajadores WHERE
ci_tra=".$_REQUEST['editar'];
$consultaDatos= mysql_query($sql,$enlace);
$datosEditar=mysql_fetch_assoc($consultaDatos);
$edita="si";
}
//fin del código//

//codigo de auditoria//
if(isset($accion)){
$hora=date("h:i:s");
$dia=date("Y-m-d");
$sql="INSERT INTO auditoria VALUES
('','$dia','$hora','$accion','$datosAuditoria')";
mysql_query($sql,$enlace);
}
$where="";
//fin del código//


?>