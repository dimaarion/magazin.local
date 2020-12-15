<div>
    <?php $controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Статьи', '');
    echo   '<form id="main_menu" class="mt-4" action="/adminpanel/newart" method="post">';
    echo  '<div class="mt-4 row">';

    $controller->getLinck(
        [
            'savenames' => 'Добавить',

            'saveurls' => '/adminpanel/articles/artnew',

            'divclass' => 'col-2 p-0'

        ]
    );
    $controller->inputs(
        [
            'type' => 'submit',
            'name' => 'art_delete',
            'value' => 'Удалить',
            'divclass' => 'col-2 p-0'

        ]
    );
    echo ' </div>';
    $controller->includer(true, true, './admin/template/input.php', $controller, [
        'placeholder' => 'Поиск статьи',
        'type' => 'text',
        'name' => 'searh',
        'divclass' => 'col-sm '
    ]);
    echo '<div id = "articles">';
    array_map(function ($t) {
        $c = new Controller();
        $c->inputsCheckbox(
            [
                'type' => 'checkbox',
                'value' => $t['art_id'],

                'names' => '<a href = "/adminpanel/articles/updateart/' . $t['art_id'] . '">' . $t['art_names'] . '</a>',

                'name' => 'delete_art_id[]',
                'id' => 'delete_art_id' . $t['art_id'],
                'inputclass' => 'col-1',
                'divclass' => 'main_menu_cl row'
            ]
        );
    }, $x);
    echo '</div>';
    ?>
    </form>

</div>