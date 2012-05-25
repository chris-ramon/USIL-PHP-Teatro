<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Panel | Obras Teatrales</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/panel.css">
	<link href='http://fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'> 
</head>
<body>
	<div class="container-fluid">
		<div id="top-colors">
				<div></div><!--
			--><div></div><!--
			--><div></div><!--
			--><div></div><!--
			--><div></div><!--
			-->		
		</div>		
		<header class="row-fluid">
			<div id="sidebar" class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header">Administrador : <h3>Admin123</h3></li>
						<li class="active"><a href="#">Obras</a></li>
					</ul>
				</div>
			</div>
			<div class="span10">
				<h1>Obras Teatrales</h1>
				<ul class="nav nav-pills pull-right">
	        <li class="active"><a href="#">DashBoard</a></li>
	        <li><a href="#">Logout</a></li>
	      </ul>
	      <div id="dashboard-content" class="row-fluid">
	      	<div class="span12">
	      		<h2>Todas las Obras</h2>
	      		<button id="add-obra-btn" class="btn pull-right btn-primary">Agregar Obra Teatral</button>
	      		<div class="separator separator-panel"></div>
				    <ul class="thumbnails">
			        <li class="span3">
			          <div class="thumbnail">
			            <img src="<?php echo base_url(); ?>upload_files/img/lasenorita.png" alt="">
			            <div class="caption">
			              <h5>La Señorita Julia</h5>
			              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			              <p><a href="#" class="btn btn-primary">Editar</a> <a href="#" class="btn btn-danger">Eliminar</a></p>
			            </div>
			          </div>
			        </li>
			        <li class="span3">
			          <div class="thumbnail">
			            <img src="<?php echo base_url(); ?>upload_files/img/donadesastre.png" alt="">
			            <div class="caption">
			              <h5>Doña Desastre</h5>
			              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			              <p><a href="#" class="btn btn-primary">Editar</a> <a href="#" class="btn btn-danger">Eliminar</a></p>
			            </div>
			          </div>
			        </li>
			        <li class="span3">
			          <div class="thumbnail">
			            <img src="<?php echo base_url(); ?>upload_files/img/dracula.png" alt="">
			            <div class="caption">
			              <h5>Drácula</h5>
			              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			              <p><a href="#" class="btn btn-primary">Editar</a> <a href="#" class="btn btn-danger">Eliminar</a></p>
			            </div>
			          </div>
			        </li>			        
			      </ul>
	      	</div>	
	      </div>
			</div>				
		</header>		
	</div>
	<script src="<?php echo base_url(); ?>application/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
</body>	
</html>