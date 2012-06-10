<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Obras de Teatro App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap-responsive.css">
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
				<h1>Obras Teatrales</h1>
				<h2>Suscríbete y participa ! comentando y dando puntos a las mejores obras.</h2>
			</div>
			<aside class="span4">
				<ul>
					<?php if($this->session->userdata('user_data')=='facebook'){ ?>
	                    <li>
	                    	<p><a href="https://graph.facebook.com/<?php echo $fb_data['fb_id']; ?>/picture"><img src="https://graph.facebook.com/<?php echo $fb_data['fb_id']; ?>/picture" alt="" class="pic" /></a>
	                                      Bienvenido, <?php echo $fb_data['name']; ?></p>
	                        <a href="<?php echo $fb_data['logoutUrl']; ?>" class="btn btn-primary" >
	                            <img src="<?php echo base_url(); ?>application/assets/img/icon-fb.png"> Cerrar Sesión
	                        </a>
	                    </li>
                    <?php } else {?>
                    	<?php if($this->session->userdata('user_data')=='twitter'){ ?>
                    		<li>
		                    	<p><a href="<?php echo $tw_data['user']->profile_image_url;?>"><img src="<?php echo $tw_data['user']->profile_image_url;?>" alt="" class="pic" /></a>
		                                      Bienvenido, <?php echo $tw_data['user']->name; ?></p>
		                        <a href="<?php echo base_url(); ?>index.php/home/logoutTw" class="btn btn-info">
									<img src="<?php echo base_url(); ?>application/assets/img/icon-tw.png">
									Cerrar Sesión
								</a>
		                    </li>
                    	<?php } else {?>
                    	
						<li>
								<a href="<?php echo $fb_data['loginUrl']; ?>" class="btn btn-primary">
									<img src="<?php echo base_url(); ?>application/assets/img/icon-fb.png"> Regístrate con Facebook
								</a>                                            	
						</li>
						<li>
								<a href="<?php echo base_url(); ?>index.php/home/loginTw" class="btn btn-info">
									<img src="<?php echo base_url(); ?>application/assets/img/icon-tw.png">
									Regístrate con Twitter
								</a>
						</li>
						<li>
                                            <div id="login-wrapper" data-status="inactive">
                                                <form method="POST" action="<?php echo base_url(); ?>index.php/home/login">
                                                    <a id="close-login-wrapper" href="#"></a>
                                                    <input type="text" placeholder="Email ... " name="email"/>
                                                    <input type="password" placeholder="Contraseña ... " name="password"/>
                                                    <input class="btn" type="submit" value="Ingresar"/>
                                                    <input class="btn" type="reset"/>
                                                </form>
                                            </div>
                                            <button id="login-btn" class="btn">
                                                    <img src="<?php echo base_url(); ?>application/assets/img/icon-arrowup.png">
                                                    Usa tu cuenta
                                            </button>
						</li>
						<?php } ?>
					<?php } ?>	
				</ul>
			</aside>
		</header>
		<div class="row"> <!-- separator -->
			<div class="span12 separator"></div>
		</div>
		<section id="obras">
			<div class="row">
				<ul class="thumbnails">
	        <li class="obra span4">
	          <div class="thumbnail well">

	            <img src="<?php echo base_url(); ?>upload_files/img/lasenorita.png">

	            <div class="caption">

								<!-- BEGIN ratings -->
								<div class="row ratings">
									<div class="span1">250 Puntos</div>
									<div class="span1">50 Likes</div>
									<div class="span1">50 Comentarios</div>
								</div> 
								<!-- END ratings -->

								<!-- BEGIN lugar y fecha de estreno -->
								<div id="info" class="row">
									<div class="span1">La Plaza Isil</div>
									<div class="span2">Estreno: 26 de Abril 2012</div>
								</div> 
								<!-- END lugar y fecha de estreno -->
								
								<div class="span1 separator separator-obra-inner"></div>

								<!-- BEGIN contenido de la obra -->
								<div class="contenido-obra">
									<p class="pull-right"><a href="#" class="btn btn-success">Participar</a></p>
		              <h3>La Señorita Julia</h3>
		              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		              consequat. Duis aute irure dolor in.</p>
									<p>Reprehenderit in voluptate velit esse
		              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a href="#">Leer Más ... </a></p>
								</div>	              
								<!-- END contenido de la obra -->

	            </div>

	          </div>
	        </li>
	        <li class="obra span4">
	          <div class="thumbnail well">

	            <img src="<?php echo base_url(); ?>upload_files/img/dracula.png">

	            <div class="caption">

								<!-- BEGIN ratings -->
								<div class="row ratings">
									<div class="span1">250 Puntos</div>
									<div class="span1">50 Likes</div>
									<div class="span1">50 Comentarios</div>
								</div> 
								<!-- END ratings -->

								<!-- BEGIN lugar y fecha de estreno -->
								<div id="info" class="row">
									<div class="span1">La Plaza Isil</div>
									<div class="span2">Estreno: 23 de Abril 2012</div>
								</div> 
								<!-- END lugar y fecha de estreno -->
								
								<div class="span1 separator separator-obra-inner"></div>

								<!-- BEGIN contenido de la obra -->
								<div class="contenido-obra">
									<p class="pull-right"><a href="#" class="btn btn-success">Participar</a></p>
		              <h3>Drácula</h3>
									<p>Reprehenderit in voluptate velit esse
		              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a href="#">Leer Más ... </a></p>
								</div>	              
								<!-- END contenido de la obra -->

	            </div>

	          </div>
	        </li>

	        <li class="obra span4">
	          <div class="thumbnail well">

	            <img src="<?php echo base_url(); ?>upload_files/img/donadesastre.png">

	            <div class="caption">

								<!-- BEGIN ratings -->
								<div class="row ratings">
									<div class="span1">250 Puntos</div>
									<div class="span1">50 Likes</div>
									<div class="span1">50 Comentarios</div>
								</div> 
								<!-- END ratings -->

								<!-- BEGIN lugar y fecha de estreno -->
								<div id="info" class="row">
									<div class="span1">La Plaza Isil</div>
									<div class="span2">Estreno: 23 de Abril 2012</div>
								</div> 
								<!-- END lugar y fecha de estreno -->
								
								<div class="span1 separator separator-obra-inner"></div>

								<!-- BEGIN contenido de la obra -->
								<div class="contenido-obra">
									<p class="pull-right"><a href="#" class="btn btn-success">Participar</a></p>
		              <h3>Doña Desastre</h3>
		              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		              tempor incididunt ut labore et dolore.</p>
									<p>Reprehenderit in voluptate velit esse
		              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a href="#">Leer Más ... </a></p>
								</div>	              
								<!-- END contenido de la obra -->

	            </div>

	          </div>
	        </li>	        
      	</ul>
			</div>
		</section>
	</div>
	<script src="<?php echo base_url(); ?>application/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/app.js"></script>

	<script>
	var config = {
		login_wrapper : $("#login-wrapper"),
		login_button : $("#login-btn"),
		close_login_wrapper_btn : $("#close-login-wrapper")
	};
	Obras.initialize(config);
	</script>
</body>
</html>