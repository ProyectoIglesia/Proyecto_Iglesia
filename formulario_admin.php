<?php
//codigo de inserción de datos//
$mensaje ="";
include("conex.php");
if(isset($_POST['usuario'])){
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$ps = $_POST['ps'];
$rps = $_POST['rps'];
$sql = "INSERT INTO usuarios(cod_usu,nom_usu,cont_usu,niv_usu,ps_usu,rps_usu) VALUES
('','$usuario', '$clave','255', '$ps', '$rps')";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $usuario.", ".$clave.", ".$ps.", ".$rps;
}else $mensaje= '<b>Registro Satisfactorio.</b>';
}
//fin del código//

//código de eliminación//
if(isset($_REQUEST['eliminar'])){
$sql= "DELETE FROM usuarios WHERE
cod_usu=".$_REQUEST['eliminar'];
if(mysql_query($sql,$enlace)) {
$mensaje= '<b>Registro Eliminado Satisfactoramente.</b>';
$accion="Eliminar";
$datosAuditoria=$_REQUEST['eliminar'];
}else $mensaje= '<b>Error al Eliminar.</b>';
}
//fin del código//

//código de modificación//
if(isset($_POST['codM'])){
$cod_usu = $_POST['codM'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$ps = $_POST['ps'];
$rps = $_POST['rps'];
$sql= "UPDATE usuarios SET nom_usu='$usuario', cont_usu='$clave',ps_usu='$ps',rps_usu='$rps' where cod_usu=$cod_usu";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Modificado Satisfactoramente.</b>';
$accion="Modificar";
$datosAuditoria=$usuario.", ".$clave.", ".$ps.", ".$rps;
}else $mensaje= '<b>Error al Modificar</b>';
}
//fin del código//

//Código para mostrar datos a Modificar//
if(isset($_REQUEST['editar'])){
$sql= "SELECT * FROM usuarios WHERE cod_usu=".$_REQUEST['editar'];
$consultaDatos= mysql_query($sql,$enlace) or die("Error - " . mysql_error());
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