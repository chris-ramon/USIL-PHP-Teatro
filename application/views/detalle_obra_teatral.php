<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Detalle | Obras Teatrales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/application/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/application/assets/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/application/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/application/assets/css/play-details.css">
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
				<h1>La Señorita Julia</h1>
				<div class="separator"></div>
			</div>
		</header>
		<div class="container-fluid">
			<div class="row-fluid">
				<div id="main-rating-wrapper" class="span2">
					<button id="main-rating" class="pull-left btn btn-success"><?php echo $obra->getPuntos(); ?> puntos</button>
				</div>
				<div class="span10">
					<div class="row-fluid">
						<aside id="play-ratings" class="span10">
							<span class="span2"><?php echo $obra->getPuntos(); ?> puntos</span>
							<span class="span2"><?php echo $obra->getLikes(); ?> Likes</span>
							<span class="span2">20 Comentarios</span>
						</aside>		
					</div>

					<div class="row-fluid">
						<aside id="participate-options" class="span10">
							<?php $attributs = array('class' => 'span2'); ?>
							<?php echo anchor('/obra/votar/'.$obra->getId().'/1' , 'Me gustó', $attributs); ?>
							<?php echo anchor('/obra/votar/'.$obra->getId().'/0' , 'No me gustó', $attributs); ?>
							<a href="#disqus_thread" class="span2">Comentar</a>						
						</aside>
					</div>

					<div class="row-fluid">
						<p class="span5"><strong>Dirige: </strong><?php echo $obra->getDirector(); ?></p>
						<p class="span5"><strong>Estreno: </strong><?php echo $obra->getEstreno(); ?></p>
					</div>

					<div class="row-fluid">
						<p class="span5"><strong>Lugar: </strong><?php echo $obra->getLugar(); ?></p>
						<p class="span5"><strong>Funciones: </strong><?php echo $obra->getFunciones(); ?></p>					
					</div>

					<div id="poster" class="row-fluid">
							<ul class="thumbnails">
								<li class="span10">
									<span class="thumbnail"><img src="<?php echo base_url(); ?>upload_files/img/<?php echo $obra->getAfiche(); ?>"></span>
								</li>
							</ul>
					</div>

					<div class="row-fluid"><div class="span10"><h3>Sinópsis</h3></div></div>

					<div class="row-fluid">
						<div class="span10">
							<p><?php echo $obra->getResena(); ?></p>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span10">
							<div class="separator"></div>
						</div>
					</div>
					
				</div>
			</div>
		<section id="comments" class="row">
			<div id="disqus_thread" class="span8 offset2"></div>
				<script type="text/javascript">
					var disqus_developer = 1;
				    var disqus_shortname = 'chris-pe';
				    (function() {
				        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</section>		
		</div>
	</div>
</body>
</html>