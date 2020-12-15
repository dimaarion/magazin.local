<?php $controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Меню', 'добавить пункт меню');?>
<form id="menunain" action="/adminpanel/menu/newmenu/new" method="post">
	<div class="mt-4 row">
		<?php

		$controller->inputs(
			[
				'type' => 'submit',
				'name' => 'new_menu_save',
				'value' => 'Сохранить',


			]
		);
		$controller->getLinck(
			[
				'saveurls' => '/adminpanel/menu/menu',
				'savenames' => 'Закрыть',

			]
		);
		?>
	</div>
	<div class="row">
		<div class="col">
			<?php
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Название',
					'name' => 'names',

				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Алиас',
					'name' => 'alias'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Заголовок страницы',
					'name' => 'title'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Ключевые слова',
					'name' => 'keywords'
				]
			);
			$controller->inputsTextarera(
				[
					'type' => 'text',
					'names' => 'Краткое описание',
					'name' => 'description'
				]
			);
			?>
		</div>
		<div class="col mt-2">
			<label for="parent_id">
				<h5>Категории</h5>
			</label>
			<select class="custom-select" name="parent_id" id="parent_id">
				<option value="0" selected>Нет</option>
				<?php foreach ($arr as $key => $value) : ?>
					<option value="<?php echo $value['menu_id']; ?>"><?php echo $value['names']; ?></option>

				<?php endforeach; ?>
			</select>
		</div>

	</div>

</form>