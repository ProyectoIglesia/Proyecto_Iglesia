<?php
//codigo de inserción de datos//
$mensaje ="";
include("conex.php");
if(isset($_POST['ci'])){
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$cedula = $_POST['ci'];
$direccion = $_POST['dir'];
$telefono = $_POST['tel'];
$fn = $_POST['fec_nac'];
$email = $_POST['email'];
$sql = "INSERT INTO estudiantes(ci_est,nom_est,ape_est,dir_est,tel_est,fec_nac_est,corr_est) VALUES
($cedula, '$nombre','$apellido', '$direccion', '$telefono', '$fn', '$email')";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.",
".$direccion.", ".$telefono.", ".$fn.", ".$email;
}else $mensaje= '<b>Error al registrar</b>';
}
//fin del código//

//código de inserción de usuario//
$mensaje ="";
if(isset($_POST['enviar'])){
$usuario = $_POST['usuario_new'];
$clave = $_POST['clave_new'];
$preg_seg = $_POST['preg_seg'];
$resp_preg_seg = $_POST['resp_preg_seg'];
$sql = "INSERT INTO usuarios (cod_usu,nom_usu,cont_usu,niv_usu,ps_usu,rps_usu) VALUES
('','$usuario', '$clave', 1, '$preg_seg', '$resp_preg_seg')";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= $usuario.", ".$clave.", ".$preg_seg.",
".$resp_preg_seg;
}else $mensaje= '<b>Error al registrar</b>';
}
//fin del código//

//código recuperar contraseña//
if(isset($_POST['usuario'])){
$usuario= $_POST['usuario'];
$resp_preg_seg= $_POST['resp_preg_seg'];
$clave= $_POST['clave'];
$sql = "SELECT * FROM usuarios Where nom_usu ='".$_POST['usuario']."' and rps_usu = '".$_POST['resp_preg_seg']."'";
$cambio=mysql_query('UPDATE usuarios SET cont_usu = "'.$clave.'" Where nom_usu = "'.$usuario.'"');
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Contraseña modificada Satisfactoramente.</b>';
$accion="Modificar_Clave";
$datosAuditoria=$usuario.", ".$resp_preg_seg.", ".$clave;
}else $mensaje= '<b>Error al modificar la contraseña</b>';
}
//Fin del código//

//código de eliminación//
if(isset($_REQUEST['eliminar'])){
$sql= "DELETE FROM estudiantes WHERE
ci_est=".$_REQUEST['eliminar'];
if(mysql_query($sql,$enlace)) {
$mensaje= '<b>Registro Eliminado Satisfactoramente.</b>';
$accion="Eliminar";
$datosAuditoria=$_REQUEST['eliminar'];
}else $mensaje= '<b>Error al Eliminar</b>';
}
//fin del código//

//código de modificación//
if(isset($_POST['cedM'])){
$nombre= $_POST['nom'];
$apellido= $_POST['ape'];
$cedula= $_POST['cedM'];
$direccion= $_POST['dir'];
$telefono= $_POST['tel'];
$fn = $_POST['fec_nac'];
$email = $_POST['email'];
$sql= "UPDATE estudiantes SET nom_est='$nombre', ape_est='$apellido',dir_est='$direccion',tel_est='$telefono', fec_nac_est='$fn',corr_est='$email' where ci_est=$cedula";
if(mysql_query($sql,$enlace)){
$mensaje= '<b>Registro Modificado Satisfactoramente.</b>';
$accion="Modificar";
$datosAuditoria=$cedula.", ".$nombre.", ".$apellido.", ".$direccion.", ".$telefono.", ".$fn.", ".$email;
}else $mensaje= '<b>Error al Modificar</b>';
}
//fin del código//

//Código para mostrar datos a Modificar//
if(isset($_REQUEST['editar'])){
$sql= "SELECT * FROM estudiantes WHERE
ci_est=".$_REQUEST['editar'];
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