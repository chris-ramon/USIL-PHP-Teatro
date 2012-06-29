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
    <script type="text/javascript" src="<?php echo base_url(); ?>application/assets/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/assets/js/jquery-ui-1.8.16.custom.min.js.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/assets/js/jquery-ui-timepicker-addon.js"></script>
    
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
	        <li><?php echo anchor('/admin/logout', 'Logout'); ?></li>
	      </ul>
	      <div id="dashboard-content" class="row-fluid">
	      	<div class="span12">
	      		<h2>Todas las Obras</h2>
                        <?php echo form_open('panel/nueva_obra_teatral'); ?> 
                        <input id="add-obra-btn" class="btn pull-right btn-primary" value="Agregar Obra Teatral" type="submit"/>
	      		 <?php echo form_close(); ?>
                        <div class="separator separator-panel"></div>
				    <ul class="thumbnails">
			         <?php foreach($obras as $o){ ?>
                                   <li class="span3">
			          <div class="thumbnail">
			            <img src="<?php echo base_url(); ?>upload_files/img/<?php echo $o->getAfiche(); ?>" alt=""/>
			            <div class="caption">
			              <h5><?php echo $o->getNombre(); ?></h5>
			              <p><?php echo substr($o->getResena(), 0, 230); ?> ...</p>
			              <p>
                                         <?php $attributes = array('class' => 'pull-right'); ?>
                                         <?php echo form_open('panel/del_obra_teatral', $attributes); ?> 
                                         <input type="hidden" name="idObra" value="<?php echo $o->getId();?>"/>
                                         <button class="btn btn-danger" type="submit">
                                         	<i class="icon-trash icon-white"></i>
                                         	Eliminar
                                         </button>
                                         <?php echo form_close(); ?>

                                         <?php echo form_open('panel/mod_obra_teatral'); ?>                                       
                                         <input type="hidden" name="idObra" value="<?php echo $o->getId();?>"/>
                                         <button class="btn btn-primary" type="submit">
                                         	<i class="icon-edit icon-white"></i>
                                         	Editar
                                         </button>
                                         <?php echo form_close(); ?>
                                         
                                      </p>
			            </div>
			          </div>
                                   </li>
                                   <?php }?>		        
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