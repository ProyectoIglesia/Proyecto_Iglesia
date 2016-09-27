<?php
include ("formulario.php");
session_start();
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
}

switch( $_SESSION['nivel'] ) {
case '1':
header( 'Location: estudiante.php' );
break;
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Centro Cristiano Restauración Mundial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
	</head>
	<body class="homepage">


	<!-- Header2 -->
		<header2>
     		
		<div class="logo">
        	<img src="images/logo.png" width="230" height="50">
        </div>
        
	<nav>
		<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="inscribir.php">Revisar Notas C. Destino</a></li>
						<li><a href="notas.php">Cargar Notas C. Destino</a></li>
						<li><a href="descargar_notas">Ver Datos de Estudiantes</a></li>
						<li><a href="cierre.php">Salir</a></li>
		</ul>
	</nav>

		</header2>
	<!-- Fin Header 2 -->
    <div><img src="images/header/welcome_tra.jpg" width="100%" height="450"></div>

	<!-- Main -->
		<div id="main">
			<div class="container">


            <header>
					<h2 align="center">Noticias</h2><br>
                    <p align="center">Descubra toda la actualidad y los testimonios de lo que Dios está haciendo alrededor del mundo a través de la Visión. Pastores y líderes que han experimentado en poco tiempo un avivamiento en sus iglesias.</p>
				</header>

                <div class="row">
                	<div id="Noticias">

						<div id="noticia1">
							<a href="#"><iframe src="https://player.vimeo.com/video/126862802?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>ESPERANZA EN MEDIO DE LA PRUEBA</b></p>


					</div>

						<div id="noticia2">
							<a href="#"><img src="images/Noticias/noticia2.jpg" width="264" height="161" alt=""></a>
							<p><b>TRANSFORMANDO NUESTRA SOCIEDAD A TRAVÉS DE LA VISIÓN</b></p>
						</div>


						<div id="noticia3">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/IqvW38ivyYM" frameborder="0" allowfullscreen></iframe></a>
							<p><b>LA SANGRE DE JESÚS EN LOS CIELOS DE CARACAS VENEZUELA</b></p>
						</div>


						<div id="noticia4">
							<a href="#"><img src="images/Noticias/noticia4.jpg" width="264" height="161" alt=""></a>
							<p><b>MÉXICO VIVE UN NUEVO COMIENZO</b></p>

					</div>

                        <div id="noticia5">
							<a href="#"><iframe src="https://player.vimeo.com/video/143442571?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>LO MEJOR DE VALIENTES GUERREROS 2015</b></p>
						</div>

					<div id="noticia6">
							<a href="#"><iframe src="https://player.vimeo.com/video/140719165?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>EL DESPERTAR LA IGLESIA LOCAL EN EUROPA</b></p>
						</div>

					<div id="noticia7">
							<a href="#"><img src="images/Noticias/noticia7.jpg" width="264" height="161" alt=""></a>
							<p><b>1600 PERSONAS VIVEN EL DESPERTAR EN RUSIA</b></p>

					</div>
					<div id="noticia8">
							<a href="#"><img src="images/Noticias/noticia8.jpg" width="264" height="161" alt=""></a>
							<p><b>CONSTRUYENDO CASA PARA DIOS EN BUCARAMANGA</b></p>

					</div>

				</div></div>

				<div class="divider">&nbsp;</div>

                <header>
					<h2 align="center"><a name="Videos">VIDEOS</a></h2><br>
                    <p align="center">Aquí puedes ver los mejores momentos de nuestras convenciones.</p>
				</header>

                <div class="row">
                	<div id="videos">

						<div id="video1">
							<a href="#"><iframe src="https://player.vimeo.com/video/162526152?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>DOCUMENTAL G12</b></p>


					</div>

						<div id="video2">
							<a href="#"><iframe src="https://player.vimeo.com/video/154112839?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMEN MANDA TU LLUVIA 2016</b></p>
						</div>


						<div id="video3">
							<a href="#"><iframe src="https://player.vimeo.com/video/154373236?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMEN CAMP PRE 2016</b></p>
						</div>


						<div id="video4">
							<a href="#"><iframe src="https://player.vimeo.com/video/133648958?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>CONVENCIÓN SOMOS UNO 2015</b></p>

					</div>

                        <div id="video5">
							<a href="#"><iframe src="https://player.vimeo.com/video/119021325?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>UN NUEVO COMIENZO</b></p>
						</div>

					<div id="video6">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/4Gfg6zjA8QY" frameborder="0" allowfullscreen></iframe></a>
							<p><b>AFILA TU HACHA</b></p>
						</div>

					<div id="video7">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/1ZNXBZHMjps" frameborder="0" allowfullscreen></iframe></a>
							<p><b>AMOR POR LA CASA DE DIOS</b></p>

					</div>
					<div id="video8">
							<a href="#"><iframe src="https://player.vimeo.com/video/108640914?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMÉN CONVENCIÓN G12 PERÚ 2014</b></p>

					</div>
				</div></div>
				<div class="divider">&nbsp;</div>

                <br><br><header>
					<h2 align="center"><a name="Predicas">PREDICAS</a></h2><br>
                    <p align="center">A través de la Visión diferentes pastores y líderes han logrado impactar sus iglesias y ciudades.<br>Es así como deseamos compartir con todos ustedes recursos y mensajes que le ayudarán a llevar el mensaje de Jesús de una manera eficaz.</p>
				</header>


				<div class="row">

                <div id="predicas"><iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/105703689&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe></div>

				</div>

			</div>
		</div>
	<!-- Main -->

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
