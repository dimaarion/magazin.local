<div class="container-fluid head text-left">
	<div class="container img-cont">
	<?php	$controller->includer(true, true, './template/logotype.php', $controller);?>
		<div class="container menu-top">
			<nav id="menu">
				<ul class="nav justify-content-end">
					<?php $x->menu_recursions($x2['alias'], 'style = "color: rgb(235, 113, 35);"'); ?>
				</ul>
			</nav>
		</div>

	</div>
</div>