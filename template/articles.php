<article class=" container-fluid">
	<div class="container content text-left mt-2">

		<h1 class="h1"><?php echo $x['art_names'] ?></h1>
		<div class="container text-left p-2">
			<?php echo html_entity_decode($x['art_content'], ENT_HTML5); ?>
		</div>

	</div>
	<?php $controller->includer(true, true, './template/dopArt.php', $controller,$x2, $x['art_names']); ?>
</article>
