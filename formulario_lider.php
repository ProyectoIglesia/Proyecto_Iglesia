<?php
//codigo de inserción de datos//
include("conex.php");
session_start();
$mensaje= "";
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
	$nivel="lider";
	$sql = "INSERT INTO lideres(ci_lider,nom_lider,ape_lider,fec_nac_lider,dir_lider,tel_lider,corr_lider) VALUES
	($cedula, '$nombre','$apellido', '$fn', '$direccion', '$telefono', '$email')";
	if(mysqli_query($enlace, $sql)){
		$sql_usuario = "INSERT INTO usuarios(cod_usu,nom_usu,cont_usu,niv_usu,ps_usu,rps_usu) VALUES ('','$usuario', '$clave', '$nivel', '', '')";
		if(mysqli_query($enlace, $sql_usuario)){
			$sql_mixto = "INSERT INTO usuarios_lideres(nom_usu,ci_lider,cont_usu,niv_usu) VALUES ('$usuario', '$cedula', '$clave', '$nivel')";
			if(mysqli_query($enlace, $sql_mixto)){
				$mensaje= '<b>Datos subidos satisfactoriamente</b>';
				$accion="Inserta";
				$datosAuditoria= $cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email.", ".$usuario.", ".$clave;
			}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
		}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
	}else $mensaje= '<b>Ocurrió un error mientras se cargaban los datos</b>';
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
$sql= "UPDATE lideres SET nom_lider='$nombre', ape_lider='$apellido', fec_nac_lider='$fn', dir_lider='$direccion', tel_lider='$telefono', corr_lider='$email' where ci_lider=$cedula";
if(mysqli_query($enlace, $sql)){
$mensaje= '<b>Registro Modificado Satisfactoramente.</b>';
$accion="Modificar";
$datosAuditoria=$cedula.", ".$nombre.", ".$apellido.", ".$fn.", ".$direccion.", ".$telefono.", ".$email."";
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
if($mensaje == '<b>Datos subidos satisfactoriamente</b>'){
$hora=date("h:i:s");
$dia=date("Y-m-d");
$usuario_audita = $_SESSION['nombre'];
$sql_auditoria = "INSERT INTO auditoria VALUES ('','$dia','$hora','$accion','$datosAuditoria', '$usuario_audita')";
mysqli_query($enlace, $sql_auditoria);
}
$where="";
//fin del código//
?>
