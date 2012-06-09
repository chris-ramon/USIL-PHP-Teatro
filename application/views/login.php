<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Login | Obras de Teatro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/panel-login.css">
	<link href='http://fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>    
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
			<div class="span4 offset4">
				<h1>Obras Teatrales</h1>
				<div class="separator"></div>
			</div>
		</header>
		<section>
			
		</section>
		<div class="row">
			<div class="span4 offset4">
                <form id="login-form" class="well" method="POST" action="<?php echo base_url(); ?>index.php/home/login">
					<label>Email</label>
					<input type="text" name="email" placeholder="Ingrese su email ... "/>
					<label>Password</label>
					<input type="password" name="password" placeholder="Ingrese su contraseña ... "/>
					<label></label>
					<input type="submit" value="Ingresar" class="btn">
					<a href="<?php echo base_url(); ?>index.php"> Regresar</a>
				</form>		
				<p>Si olvidó su contraseña de Facebook, <a href="https://www.facebook.com/recover.php">haga clic aquí.</a></p>
			</div>
		</div>
	</div>
</body>
</html>