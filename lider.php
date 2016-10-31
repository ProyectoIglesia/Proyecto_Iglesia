<?php
include ("formulario.php");
// Valida si accede de forma indebida.
if (empty($_SESSION["autentificado"])) {
header("Location: index.php");
exit();
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
		<link rel="shortcut icon" href="images/favicon.png">
		<link rel="stylesheet" href="css/fonts.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<link rel="stylesheet" type="text/css" href="engine1/style_slider.css" />
		<script type="text/javascript" src="engine1/jquery.js"></script>
	</head>
	<body class="homepage">

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
			<li><a href="lider.php">Inicio</a></li>
			<li><a href="subir_notas.php">Cargar notas</a></li>
			<li><a href="tareas.php">Cargar devocional</a></li>
			<li><a href="grafica_nota2.php">Graficos de notas</a></li>
			<li><a href="cierre.php">Salir</a></li>
		</ul>
	</nav>

		</header2>
	<!-- Fin Header 2 -->

        <!-- Slider -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="images/slider/image3.png" alt="" title="" id="wows1_0"/></li>
		<li><img src="images/slider/image2.png" alt="" title="" id="wows1_1"/></li>
		<li><img src="images/slider/image1.png" alt="" title="" id="wows1_2"/></li>
		<li><img src="images/slider/image4.png" alt="" title="" id="wows1_3"/></li>
	</ul></div>
</div>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- FIN Slider -->

	<!-- Main -->
		<div id="main">

        	<!-- Container -->
			<div class="container">

			<!-- Header Noticias -->
            <header>
					<h2 align="center">NOTICIAS</h2><br>
                    <p align="center">Descubra toda la actualidad y los testimonios de lo que Dios está haciendo alrededor del mundo a través de la Visión. Pastores y líderes que han experimentado en poco tiempo un avivamiento en sus iglesias.</p>
			</header>
			<!-- Fin Header Noticias -->

				<!-- Row y Noticias -->
                <div class="row">
                	<div id="Noticias">

                		<!-- Noticia 1 -->
						<div id="noticia1">
							<a href="#"><iframe src="https://player.vimeo.com/video/126862802?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>ESPERANZA EN MEDIO DE LA PRUEBA</b></p>
						</div>
						<!-- Fin Noticia 1 -->

						<!-- Noticia 2 -->
						<div id="noticia2">
							<a href="#"><img src="images/Noticias/noticia2.jpg" width="264" height="161" alt=""></a>
							<p><b>TRANSFORMANDO NUESTRA SOCIEDAD A TRAVÉS DE LA VISIÓN</b></p>
						</div>
						<!-- Fin Noticia 2 -->

						<!-- Noticia 3 -->
						<div id="noticia3">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/IqvW38ivyYM" frameborder="0" allowfullscreen></iframe></a>
							<p><b>LA SANGRE DE JESÚS EN LOS CIELOS DE CARACAS VENEZUELA</b></p>
						</div>
						<!-- Fin Noticia 3 -->

						<!-- Noticia 4 -->
						<div id="noticia4">
							<a href="#"><img src="images/Noticias/noticia4.jpg" width="264" height="161" alt=""></a>
							<p><b>MÉXICO VIVE UN NUEVO COMIENZO</b></p>
						</div>
						<!-- Fin Noticia 4 -->

						<!-- Noticia 5 -->
                        <div id="noticia5">
							<a href="#"><iframe src="https://player.vimeo.com/video/143442571?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>LO MEJOR DE VALIENTES GUERREROS 2015</b></p>
						</div>
						<!-- Fin Noticia 5 -->

						<!-- Noticia 6 -->
						<div id="noticia6">
							<a href="#"><iframe src="https://player.vimeo.com/video/140719165?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>EL DESPERTAR LA IGLESIA LOCAL EN EUROPA</b></p>
						</div>
						<!-- Fin Noticia 6 -->

						<!-- Noticia 7 -->
						<div id="noticia7">
							<a href="#"><img src="images/Noticias/noticia7.jpg" width="264" height="161" alt=""></a>
							<p><b>1600 PERSONAS VIVEN EL DESPERTAR EN RUSIA</b></p>
						</div>
						<!-- Fin Noticia 7 -->

						<!-- Noticia 8 -->
						<div id="noticia8">
							<a href="#"><img src="images/Noticias/noticia8.jpg" width="264" height="161" alt=""></a>
							<p><b>CONSTRUYENDO CASA PARA DIOS EN BUCARAMANGA</b></p>
						</div>
						<!-- Fin Noticia 8 -->

					</div>
				</div>
				<!-- Fin Row y Noticias -->

				<div class="divider">&nbsp;</div>

			<!-- Header Videos -->
            <header>
				<h2 align="center"><a name="Videos">VIDEOS</a></h2><br>
                <p align="center">Aquí puedes ver los mejores momentos de nuestras convenciones.</p>
			</header>
			<!-- Fin Header Videos -->

				<!-- Row y Videos -->
                <div class="row">
                	<div id="videos">

                		<!-- Video 1 -->
						<div id="video1">
							<a href="#"><iframe src="https://player.vimeo.com/video/162526152?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>DOCUMENTAL G12</b></p>
						</div>
						<!-- Fin Video 1 -->

						<!-- Video 2 -->
						<div id="video2">
							<a href="#"><iframe src="https://player.vimeo.com/video/154112839?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMEN MANDA TU LLUVIA 2016</b></p>
						</div>
						<!-- Fin Video 2 -->

						<!-- Video 3 -->
						<div id="video3">
							<a href="#"><iframe src="https://player.vimeo.com/video/154373236?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMEN CAMP PRE 2016</b></p>
						</div>
						<!-- Fin Video 3 -->

						<!-- Video 4 -->
						<div id="video4">
							<a href="#"><iframe src="https://player.vimeo.com/video/133648958?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>CONVENCIÓN SOMOS UNO 2015</b></p>
						</div>
						<!-- Fin Video 4 -->

						<!-- Video 5 -->
                        <div id="video5">
							<a href="#"><iframe src="https://player.vimeo.com/video/119021325?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>UN NUEVO COMIENZO</b></p>
						</div>
						<!-- Fin Video 5 -->

						<!-- Video 6 -->
						<div id="video6">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/4Gfg6zjA8QY" frameborder="0" allowfullscreen></iframe></a>
							<p><b>AFILA TU HACHA</b></p>
						</div>
						<!-- Fin Video 6 -->

						<!-- Video 7 -->
						<div id="video7">
							<a href="#"><iframe width="264" height="161" src="https://www.youtube.com/embed/1ZNXBZHMjps" frameborder="0" allowfullscreen></iframe></a>
							<p><b>AMOR POR LA CASA DE DIOS</b></p>
						</div>
						<!-- Fin Video 7 -->

						<!-- Video 8 -->
						<div id="video8">
							<a href="#"><iframe src="https://player.vimeo.com/video/108640914?color=ffffff&title=0&byline=0&portrait=0" width="264" height="161" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
							<p><b>RESUMÉN CONVENCIÓN G12 PERÚ 2014</b></p>
						</div>
						<!-- Fin Video 8 -->

					</div>
				</div>
				<!-- Fin Row y Videos -->

				<div class="divider">&nbsp;</div

			<!-- Header Predicas -->
            <header>
				<h2 align="center"><a name="Predicas">PREDICAS</a></h2><br>
                <p align="center">A través de la Visión diferentes pastores y líderes han logrado impactar sus iglesias y ciudades.<br>Es así como deseamos compartir con todos ustedes recursos y mensajes que le ayudarán a llevar el mensaje de Jesús de una manera eficaz.</p>
			</header>
			<!-- Fin Header Predicas -->

				<!-- Row y Predicas -->
				<div class="row">
					<div id="predicas">

                	<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/105703689&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>

					</div>
				</div>
				<!-- Fin Row y Predicas -->

				<div class="divider">&nbsp;</div>

			<!-- Header Ubicacion -->
			<header>
				<h2 align="center"><a name="Ubicacion">UBICACIÓN</a></h2><br>
				<p align="center">Calle Sánchez Carrero, entre Miranda y Páez<br>al frente de los Almacenes Generales de la Ovejita,Maracay</p>
			</header>
			<!-- Fin Header Ubicacion -->

  				<!-- Div e Iframe -->
				<div align="center">
  						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1963.0672161956315!2d-67.6072883!3d10.2507401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803c9cc9e279b1%3A0x8b154dc686d45070!2sIglesia+Centro+Cristiano+de+Restauraci%C3%B3n+Mundial!5e0!3m2!1ses-419!2sve!4v1461602416848" width="900" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

  				</div>
  				<!-- Fin Div e Iframe -->

		</div>
		<!-- Fin Main -->
<br><br><br>
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
