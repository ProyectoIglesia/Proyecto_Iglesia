<?php
include("conex.php"); 
session_start();
//codigo de inserción de datos//
$mensaje ="";
if(isset($_POST['ci'])){
	$cedula = $_POST['ci'];
	$nombre = $_POST['nom'];
	$apellido = $_POST['ape'];
	$fn = $_POST['fec_nac'];
	$direccion = $_POST['dir'];
	$telefono = $_POST['tel'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario_new'];
	$clave = $_POST['clave_new'];
	$nivel="estudiante";
	$sql = "INSERT INTO estudiantes(ci_est,nom_est,ape_est,fec_nac_est,dir_est,tel_est,corr_est) VALUES
	($cedula, '$nombre','$apellido', '$fn', '$direccion', '$telefono', '$email')";
	if(mysqli_query($enlace, $sql)){
		$sql_usuario = "INSERT INTO usuarios(cod_usu,nom_usu,cont_usu,niv_usu,ps_usu,rps_usu) VALUES ('','$usuario', '$clave', '$nivel', '', '')";
		if(mysqli_query($enlace, $sql_usuario)){
			$sql_mixto = "INSERT INTO usuarios_estes(nom_usu,ci_est,cont_usu,niv_usu) VALUES ('$usuario', '$cedula', '$clave', '$nivel')";
			if(mysqli_query($enlace, $sql_mixto)){
				$mensaje= '<b>Datos subidos satisfactoriamente</b>';
				$accion="Inserta";
				$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$usuario.", ".$clave;
			}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
		}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
	}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
}
//fin del código//
if (isset($_POST['ci']) && isset($_POST['usuario_new'])) {
$cedula = $_POST['ci'];
$usuario= $_POST['usuario_new'];
$clave= $_POST['clave_new'];
$nivel="estudiante";
$sql = "INSERT INTO usuarios_estudiantes(nom_usu,ci_est,cont_usu,niv_usu) VALUES
('$usuario', '$cedula', '$clave', '$nivel')";
if(mysqli_query($enlace, $sql)){
$mensaje= '<b>Registro Satisfactorio.</b>';
$accion="Inserta";
$datosAuditoria= "$usuario, $cedula, $clave, $nivel";
}else $mensaje= '<b>Error al registrar</b>';

}

//código recuperar contraseña//
if(isset($_POST['usuario'])){
$usuario= $_POST['usuario'];
$resp_preg_seg= $_POST['resp_preg_seg'];
$clave= $_POST['clave'];
$sql = "SELECT * FROM usuarios Where nom_usu ='".$_POST['usuario']."' and rps_usu = '".$_POST['resp_preg_seg']."'";
$cambio=mysqli_query($enlace,'UPDATE usuarios SET cont_usu = "'.$clave.'" Where nom_usu = "'.$usuario.'"');
if(mysqli_query($enlace, $sql)){
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
if(mysqli_query($enlace, $sql)) {
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
if(mysqli_query($enlace, $sql)){
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
$consultaDatos= mysqli_query($enlace, $sql);
$datosEditar=mysqli_fetch_assoc($consultaDatos);
$edita="si";
}
//fin del código//

//codigo de auditoria//
if(isset($accion)){
$hora=date("h:i:s");
$dia=date("Y-m-d");
if(isset($_SESSION["nombre"])){
	$usuario_audita = $_SESSION["nombre"];
}
$usuario_audita = "";
$sql="INSERT INTO auditoria VALUES ('','$dia','$hora','$accion','$datosAuditoria','$usuario_audita')";
mysqli_query($enlace, $sql);
}
$where="";
//fin del código//
?>
