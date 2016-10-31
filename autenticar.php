<?php
include("conex.php");
session_start();
$sql = "Select * From usuarios Where nom_usu='".$_POST['usuario']."' and cont_usu = '".$_POST['clave']."'";
$consulta = mysqli_query($enlace, $sql);
if ($datos=mysqli_fetch_assoc($consulta)){
$_SESSION["autentificado"] = "SI";
$_SESSION["nombre"]= $datos['nom_usu'];
$_SESSION["nivel"]= $datos['niv_usu'];
$accion = "Inicio de sesion";
$hora=date("h:i:s");
$dia=date("Y-m-d");
$usuario_audita = $_SESSION['nombre'];
$sql_auditoria = "INSERT INTO auditoria VALUES ('','$dia','$hora','$accion','', '$usuario_audita')";
mysqli_query($enlace, $sql_auditoria);

switch( $_SESSION['nivel'] ) {
case 'administrador':
header( 'Location: administrador.php' );
break;
case 'lider':
header( 'Location: lider.php' );
break;
case 'estudiante';
header('Location: estudiante.php');
break;
}
}else {
header("Location: acceder.php?m=5&error=1");
}

?>
