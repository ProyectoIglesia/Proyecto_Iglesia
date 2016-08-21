<?php
	$enlace = mysqli_connect("localhost","root","","iglesia");
	if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
?>
