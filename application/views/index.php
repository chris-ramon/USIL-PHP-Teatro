<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Obras de Teatro App</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/app.css">
		<link href='http://fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Imprima' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<div id="top-colors">
				<div></div><!--
			--><div></div><!--
			--><div></div><!--
			--><div></div><!--
			--><div></div><!--
			-->		
		</div>
		<header class="row">
			<div class="span8">
				<h1>Obras de Teatro</h1>
				<h2>Suscríbete y participa ! comentando y dando puntos a las mejores obras.</h2>
			</div>

			<aside class="span4">
				<ul>
					<li>
						<button class="btn btn-primary">
							<img src="<?php echo base_url(); ?>application/assets/img/icon-fb.png">
							Regístrate con Facebook
						</button>
					</li>
					<li>
						<button class="btn btn-info">
							<img src="<?php echo base_url(); ?>application/assets/img/icon-tw.png">
							Regístrate con Twitter
						</button>
					</li>
					<li>
					<div id="login-wrapper" data-status="inactive">
						<input type="text" placeholder="Email ... ">
						<input type="text" placeholder="Password ... ">
						<input class="btn" type="submit" value="Ingresar">
					</div>
					<button id="login-btn" class="btn">
						<img src="<?php echo base_url(); ?>application/assets/img/icon-arrowup.png">
						Usa tu cuenta
					</button>
					</li>
				</ul>
			</aside>
		</header>
		<div class="row"> <!-- separator -->
			<div class="span12 separator"></div>
		</div>
		<section id="obras">
			<div class="row">
				<article class="obra span4">
					<img src="<?php echo base_url(); ?>upload_files/img/lasenorita.png">
					<!-- BEGIN ratings -->
					<div id="ratings" class="row">
						<div class="span1">250 Puntos</div>
						<div class="span1">50 Likes</div>
						<div class="span2">50 Comentarios</div>
					</div> <!-- END ratings -->
					<!-- BEGIN lugar y fecha de estreno -->
					<div id="info" class="row">
						<div class="span2">La Plaza Isil</div>
						<div class="span2">Estreno: 26 de Abril 2012</div>
					</div> <!-- END lugar y fecha de estreno -->
					<div class="row">
						<div class="span4 separator separator-obra-inner"></div>
					</div>
					<!-- BEGIN contenido obra -->
					<div id="contenido-obra" class="row">
						<div class="span4">
							<h3>La Señorita Julia</h3>
						</div>
						<div class="span4">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="span4">
							<button class="btn">Participar</button>
						</div>
					</div> <!-- END contenido de la obra -->
				</article>			
				<article class="obra span4">
					<img src="<?php echo base_url(); ?>upload_files/img/dracula.png">
					<!-- BEGIN ratings -->
					<div id="ratings" class="row">
						<div class="span1">250 Puntos</div>
						<div class="span1">50 Likes</div>
						<div class="span2">50 Comentarios</div>
					</div> <!-- END ratings -->
					<!-- BEGIN lugar y fecha de estreno -->
					<div id="info" class="row">
						<div class="span2">La Plaza Isil</div>
						<div class="span2">Estreno: 26 de Abril 2012</div>
					</div> <!-- END lugar y fecha de estreno -->
					<div class="row">
						<div class="span4 separator separator-obra-inner"></div>
					</div>
					<!-- BEGIN contenido obra -->
					<div id="contenido-obra" class="row">
						<div class="span4">
							<h3>Doña Desastre</h3>
						</div>
						<div class="span4">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="span4">
							<button class="btn">Participar</button>
						</div>
					</div> <!-- END contenido de la obra -->
				</article>		
				<article class="obra span4">
					<img src="<?php echo base_url(); ?>upload_files/img/donadesastre.png">
					<!-- BEGIN ratings -->
					<div id="ratings" class="row">
						<div class="span1">250 Puntos</div>
						<div class="span1">50 Likes</div>
						<div class="span2">50 Comentarios</div>
					</div> <!-- END ratings -->
					<!-- BEGIN lugar y fecha de estreno -->
					<div id="info" class="row">
						<div class="span2">La Plaza Isil</div>
						<div class="span2">Estreno: 26 de Abril 2012</div>
					</div> <!-- END lugar y fecha de estreno -->
					<div class="row">
						<div class="span4 separator separator-obra-inner"></div>
					</div>
					<!-- BEGIN contenido obra -->
					<div id="contenido-obra" class="row">
						<div class="span4">
							<h3>DRÁCULA</h3>
						</div>
						<div class="span4">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="span4">
							<button class="btn">Participar</button>
						</div>
					</div> <!-- END contenido de la obra -->
				</article>
			</div>
			<div class="row">
								<article class="obra span4">
					<img src="<?php echo base_url(); ?>upload_files/img/donadesastre.png">
					<!-- BEGIN ratings -->
					<div id="ratings" class="row">
						<div class="span1">250 Puntos</div>
						<div class="span1">50 Likes</div>
						<div class="span2">50 Comentarios</div>
					</div> <!-- END ratings -->
					<!-- BEGIN lugar y fecha de estreno -->
					<div id="info" class="row">
						<div class="span2">La Plaza Isil</div>
						<div class="span2">Estreno: 26 de Abril 2012</div>
					</div> <!-- END lugar y fecha de estreno -->
					<div class="row">
						<div class="span4 separator separator-obra-inner"></div>
					</div>
					<!-- BEGIN contenido obra -->
					<div id="contenido-obra" class="row">
						<div class="span4">
							<h3>DRÁCULA</h3>
						</div>
						<div class="span4">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="span4">
							<button class="btn">Participar</button>
						</div>
					</div> <!-- END contenido de la obra -->
				</article>
			</div>

		</section>
	</div>
	<script src="<?php echo base_url(); ?>application/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/app.js"></script>
	<script>
	var config = {
		login_wrapper : $("#login-wrapper"),
		login_button : $("#login-btn")
	};
	Obras.initialize(config);
	</script>
</body>
</html>