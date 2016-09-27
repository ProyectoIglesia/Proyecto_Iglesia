<?php
include ("formulario.php");
session_start();
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}

?>
<!doctype html>
<html>
<head>
		<title>Centro Cristiano Restauración Mundial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/fonts.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>


	</head>

<body>

<!-- Redes sociales - Barra lateral -->
<div class="social">
    <ul>
      <li><a href="https://www.facebook.com/restauramundial" target="_blank" class="icon-facebook"></a></li>
      <li><a href="http://www.twitter.com/" target="_blank" class="icon-twitter"></a></li>
      <li><a href="http://www.youtube.com/" target="_blank" class="icon-youtube"></a></li>
      <li><a href="http://www.instagram.com/" target="_blank" class="icon-instagram"></a></li>
      <li><a href="mailto:restauracionmundial@gmail.com" class="icon-mail"></a></li>
    </ul>
  </div>
<!-- Fin Redes sociales - Barra lateral -->


<!-- Header2 -->
    <header2>
        
    <div class="logo">
          <img src="images/logo.png" width="230" height="50">
        </div>
        
  <nav>
    <ul>
      <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Inscribir capacitación destino</a></li>
            <li><a href="notas.php">Ver notas capacitación destino</a></li>
            <li><a href="descargar_notas">Descargar Notas</a></li>
            <li><a href="cierre.php">Salir</a></li>
    </ul>
  </nav>

    </header2>
  <!-- Fin Header 2 -->
    <div><img src="images/header/insc_cap_dest.jpg" width="100%" height="450"></div>

<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
						<div id="content" class="12u skel-cell-important">

								<header align="center">
                  <?php echo $mensaje ?>
                </header>

                <div class="Formularios" >
<form action="?m=1" method="post" name="form1" id="form1">
 <table width="80%" border="1" align="center" cellpadding="5" cellspacing="5">
  <tr>
    </tr>
  <tr>
    <td colspan="3" align="center"></td>
    </tr>
  <tr>
    <td width="50%" align="right"><b>Cedula (<a style="color:red">*</a>)</b></td>
    <td width="8%">&nbsp;</td>
    <td width="60%"><input style="width:50%; border-radius:5px" required pattern="[0-9]+" type="text"
name="ci" id="ci" placeholder="Cedula del Estudiante"</td>
  </tr>
  <tr>
    <td align="right"><b>Nombres (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:85%; border-radius:5px" type="text" required pattern="[a-z A-Z]+"
name="nom" id="nom" placeholder="Nombre completo del Estudiante"></td>
  </tr>
  <tr>
    <td align="right"><b>Apellidos (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:85%; border-radius:5px" required pattern="[a-z A-Z]+" type="text"
name="ape" id="ape" placeholder="Apellido completo del Estudiante"></td>
  </tr>

  <tr>
    <td align="right"><b>Nivel Cap. Destino (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><select style="width:10%; border-radius:5px" name="niv_cap_dest" id="niv_cap_dest">
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select></td>
    </tr>

    <tr>
    <td align="right"><b>Correo (<a style="color:red">*</a>)</b></td>
    <td>&nbsp;</td>
    <td><input style="width:85%; border-radius:5px;" required type="email" name="email"
id="email" placeholder="Correo del estudiante"></td>
  </tr>
  <tr>
    <td align="right"><input style="margin-top:20px;" name="button" type="submit" value="Enviar registro"></td>
    <td>&nbsp;</td>
    <td><input name="res" type="reset" value="reestablecer"></td>
  </tr>
</table>
<a style="margin-left:440px;"><b> (<a style="color:red">*</a>) : Campos Obligatios</b></a>

</form>
</div>



						</div>
					<!-- /Content -->

				</div>

			</div>
		</div>
</div>

<!-- Footer -->
    <div id="footer">
      <div class="container">
        <div class="row">

          <img src="images/footer.png" width="500" height="350">

          <div class="6u">
            <section>
              <header>
                <h2>Restauración Mundial</h2>
              </header>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat laoreet eleifend. Duis dictum, nisi vitae hendrerit hendrerit, ipsum velit viverra mauris, sit amet eleifend metus ipsum eu magna. Aenean dignissim lorem neque, sit amet convallis ante suscipit et. Vivamus iaculis quam nec neque dignissim convallis. Nulla ullamcorper at enim ac euismod. Ut tristique tincidunt lacus, ac interdum ante mollis non. Ut tempus eget ante a facilisis.</p><br>
              <ul class="default">
                <li style="color:#FFF"><a href="#">Ubicación:</a> Calle Sánchez Carrero, entre Miranda y Páez, al frente de los Almacenes Generales de la Ovejita,Calle Sanchez Carrero,Maracay</li>
                <li style="color:#FFF">Teléfono: XXXXX-XXXXXXXXX-XXXXXXXXXXX</li>
                <li style="color:#FFF">Horarios de atención: XXXX - XXXXX</li>
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>
  <!-- Footer -->

</body>
</html>
