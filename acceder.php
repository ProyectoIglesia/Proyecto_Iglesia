<?php
include ("formulario.php");
?>
<!DOCTYPE HTML>
<!--
	Monochromed by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Centro Cristiano Restauración Mundial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->


	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1 style="font-size:72px">Centro Cristiano</h1>
						<h1 style="font-size:36px; margin-top:30px; color:#CCC">Restauración Mundial</h1>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="index.php#Videos">Videos</a></li>
							<li><a href="index.php#Predicas">Predicas</a></li>
							<li><a href="ubicacion.php">Ubicación</a></li>
							<li><a href="Acceder.php">Acceder/Registrarse</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
						<div id="content" class="12u skel-cell-important">
							
								
                                
						<div class="container">
            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="post" action="autenticar.php" name="form1" id="form1"> 
                                <h1>iniciar sessión</h1> 
                                	<?php
										if(isset($_REQUEST["error"])){
										if ($_REQUEST["error"]==1)
										echo '<b><center>Datos incorrectos</center></b>';
										}
									?>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Tu nombre de usuario</label>
                                    <input id="usuario" name="usuario" required="required" type="text" placeholder="Ejemplo: MiNombreUsuario"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Tu contraseña</label>
                                    <input id="clave" name="clave" required="required" type="password" placeholder="Ejemplo: X8df!90EO" /> 
                                </p>
                                <p class="keeplogin">
									<a href="recuperar_pass.php">Olvido su clave ?</a>
								</p>
                                <p class="login button"> 
                                    <input style="width:150px; height:40px; margin-top:-20px; margin-left:-50px;" type="submit" value="Ingresar" /> 
								</p>
                                <p class="change_link">
									No eres miembro todavía ?
									<a href="#toregister" class="to_register">Registrate</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form action="?m=1#toregister" method="post" name="form2" id="form2"> 
                                <h1>registrarse</h1> 
                                <?php echo '<center>'.$mensaje.'</center>' ?>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" required pattern="[a-z A-Z 0-9]+">Tu Usuario</label>
                                    <input id="usuario_new" name="usuario_new" required="required" type="text" placeholder="Ejemplo: MiUsuario999" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Tu Contraseña </label>
                                    <input id="clave_new" name="clave_new" required="required" type="password" placeholder="Ejemplo:  X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="preg_seg" >Pregunta de seguridad</label>
                                    <select name="preg_seg" id="preg_seg">
         								<option value="null">Selecciona una Pregunta</option> 
         								<option value="Profesor Favorito">Quien fue su profesor favorito?</option> 
         								<option value="personaje favorito">Quien es su personaje histórico favorito?</option> 
         								<option value="Mejor Amigo">Quien fue su mejor amigo en la niñez?</option> 
         								<option value="Lugar Favorito">Cual es su lugar favorito para visitar?</option> 
         								<option value="Comida Preferida">Cual es su comida preferida?</option> 
         								<option value="Pelicula Favorita">Cual es su película favorita?</option> 
         								<option value="Grupo Favorito">Cual es su grupo de música favorito?</option> 
         								<option value="Nombre de tu Mascota">Cual es el nombre de tu mascota?</option>
                					</select>
                                </p>
                                <p> 
                                    <label for="resp_preg_seg" data-icon="p" required pattern="[a-z A-Z 0-9]+">Respuesta secreta</label>
                                    <input id="resp_preg_seg" name="resp_preg_seg" required="required" type="password"/> 
                                </p>
                                <p class="signin button"> 
									<input style="width:150px; height:40px; margin-top:-20px; margin-left:-50px;" type="submit" value="Registrar" name="enviar" /> 
								</p>
                                <p class="change_link">  
									Ya eres miembro ?
									<a href="#tologin" class="to_register"> Iniciar Sessión </a>
								</p>
                            </form>
                        </div>

                    </div>

					

                </div>  
            </section>
        </div>

  
                  
							
						</div>
					<!-- /Content -->
						
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