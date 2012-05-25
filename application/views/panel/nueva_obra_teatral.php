<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Agregar Obra | Obras Teatrales</title>
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
	      		<h2>Nueva Obra Teatral</h2>
	      		<button id="add-obra-btn" class="btn pull-right btn-warning">Cancelar</button>
	      		<div class="separator separator-panel"></div>
	      		<?php $attributes = array('class' => 'well', 'id' => 'form-nueva-obra'); ?>
	      		<?php echo form_open('panel/nueva_obra_teatral', $attributes); ?>
	      			<h3>Detalles</h3>
	      			<label for="nombre">Nombre</label>
	      			<input id="nombre" name="nombre" type="text" class="span8" autofocus="autofocus"
	      			value="<?php echo set_value('nombre'); ?>">

	      			<label for="autor">Autor</label>
	      			<input id="autor" name="autor" type="text"class="span6"
	      			value="<?php echo set_value('autor'); ?>">

	      			<label for="director">Director</label>
	      			<input id="director" name="director" type="text"  class="span6"
	      			value="<?php echo set_value('director'); ?>">

	      			<label for="resena">Reseña</label>
	      			<textarea id="resena" name="resena" class="span6" rows="4"></textarea
	      			value="<?php echo set_value('resena'); ?>">

	      			<label for="afiche">Afiche</label>
	      			<input id="afiche" type="file">

	      			<h3>Actores</h3>
	      			<select>
	      				<option>Escoger ...</option>
	      				<option>Nuevo Actor</option>
	      			</select>
	      			<!-- agregar actor -->
	      				<label for="nombreactor">Nombre</label>
	      				<input id="nombreactor" name="nombreactor" type="text"  class="span4" >
	      				<input type="submit" value="Agregar" class="btn">
	      				<div class="row-fluid actors-wrapper">
									<div class="span3 well">
										<a href="#" class="pull-right">Eliminar</a>
										<p>Este es un Actor</p>
									</div>								
									<div class="span3 well">
										<a href="#" class="pull-right">Eliminar</a>
										<p>Este es otro Actor</p>
									</div>
	      				</div>
							<!-- end agregar actor -->

							<h3>Datos del Teatro</h3>
							<label for="sala">Sala</label>
							<input id="sala" type="text" name="sala" class="span4">
							<label for="horarios">Horarios</label>
							<input id="horarios" type="text" name="horarios" class="span4">
							<label for="temporada">Temporada</label>
							<input id="temporada" type="text" name="temporada" class="span4">
							<label for="precio">Precio</label>
							<input id="precio" type="text" name="precio" class="span2">

							<input id="submit-obra" type="submit" value="Crear Obra" class="btn btn-primary">
	      		<?php echo form_close(); ?>
	      	</div>	
	      </div>
			</div>				
		</header>		
	</div>	
</body>
</html>