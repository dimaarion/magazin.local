<?php
$menu_update_parent = $arr->queryRow(
    'menu_id',
    $row['parent_id']
);
$controller->includer(
    true,
    true,
    './admin/template/headtitle.php',
    $controller,
    'Меню',
    'редактировать пункт меню',
    ['names' => $row['names']]
);
?>
<form id="menunain" action="/adminpanel/menu/updatemenu/<?php echo $id; ?>" method="post">
    <div class="mt-4 row">
        <?php
        $controller->inputs(
            [
                'type' => 'submit',
                'name' => 'update_menu_save',
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
                    'divclass' => '',
                    'value' => $row['names']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias',
                    'value' => $row['alias']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title',
                    'value' => $row['title']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords',
                    'value' => $row['keywords']
                ]
            );
            $controller->inputsTextarera(
                [
                    'names' => 'Краткое описание',
                    'name' => 'description',
                    'value' => $row['descriptions']
                ]
            );
            ?>
        </div>
        <div class="col">
            <div class="col mt-2">
                <label for="parent_id">
                    <h5>
                        Категории
                    </h5>
                </label>
                <select class="custom-select" name="parent_id" id="parent_id">
                    <option value="<?php
                                    if ($menu_update_parent['names']) {
                                        echo $menu_update_parent['menu_id'];
                                    } else {
                                        echo '0';
                                    };
                                    ?>" selected>
                        <?php
                        if ($menu_update_parent['menu_id']) {
                            echo $menu_update_parent['names'];
                        } else {
                            echo 'Нет';
                        };
                        ?></option>
                    <?php
                    if ($menu_update_parent['menu_id']) :
                    ?>
                        <option value="0">
                            Нет
                        </option>
                    <?php
                    endif;
                    ?>
                    <?php
                    foreach ($id2 as $key => $value) :
                    ?>
                        <option value="<?php echo $value['menu_id']; ?>">
                            <?php
                            echo $value['names'];
                            ?>
                        </option>

                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="col" >
                <div class="row">
                    <div class="col">
                        <h5 class="h5  mt-4">
                            Статьи
                        </h5>
                    </div>
                    <div class="col">
                        <?php $controller->inputs(
                            [
                                'type' => 'submit',
                                'name' => 'update_menu_art_delete',
                                'value' => 'Удалить',
                                'divclass' => 'mt-4 '
                            ]
                        ); ?>
                    </div>
                </div>
                <div class="col" id="menuArt">
                    <?php
                    array_map(function ($params) {
                        $c = new Controller();
                        $c->inputsCheckbox(
                            [
                                'type' => 'checkbox',
                                'value' => $params['art_id'],
                                'names' => $params['art_names'],
                                'name' => 'menu_articles',
                                'id' => 'update_menu_art' . $params['art_id'],
                                'inputclass' => 'col-1',
                                'divclass' => 'row update_menu_art'
                            ]
                        );
                    }, $x);

                    ?>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5 class="h5 mt-4">
                            Привязать статью
                        </h5>
                    </div>
                    <div class="col">
                        <?php
                        $controller->inputs(
                            [
                                'type' => 'submit',
                                'name' => 'update_menu_art_save',
                                'value' => 'Сохранить',
                                'divclass' => 'mt-4 '
                            ]
                        );
                        $controller->inputs(
                            [
                                'type' => 'hidden',
                                'name' => 'menu',
                                'value' => $id,

                            ]
                        );
                        ?>
                    </div>
                </div>
                <div class="col new_menu_art_bl" id="privArt">
                    <?php
                    array_map(function ($params) {
                        $c = new Controller();
                        $c->inputsCheckbox(
                            [
                                'type' => 'checkbox',
                                'value' => $params['art_id'],
                                'names' => $params['art_names'],
                                'name' => 'articles',
                                'id' => 'new_menu_art' . $params['art_id'],
                                'inputclass' => 'col-1',
                                'divclass' => 'new_menu_art row'
                            ]
                        );
                    }, $x2);
                    ?>
                </div>
            </div>
        </div>

    </div>

</form>