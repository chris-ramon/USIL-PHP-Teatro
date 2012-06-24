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
			<p></p>
			<div class="span4 offset4">
                <form id="login-form" class="well" method="POST" action="<?php echo base_url(); ?>index.php/home/confirm_pwd">
                	<p>Usuario: <small style="font-size:15px;"><?php echo $username;?><?php echo $email;?></small></p>
                	<input type="hidden" name="username" value="<?php echo $username;?>"/>
                	<input type="hidden" name="email" value="<?php echo $email;?>"/>
					<label>Contraseña</label>
					<input type="password" name="password" placeholder="Ingrese una contraseña ... "/>
					<label>Confirmar contraseña</label>
					<input type="password" name="password2" placeholder="Ingrese nuevamente la contraseña ... "/>
					<p style="color:#DF0023;"><?php echo $msg;?></p>
					<input type="submit" value="Aceptar" class="btn"/>
				</form>		
			</div>
		</div>
	</div>
</body>
</html>