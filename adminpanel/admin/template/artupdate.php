<?php $controller->includer(
    true,
    true,
    './admin/template/headtitle.php',
    $controller,
    'Статьи',
    'редактировать статью',
    ['names'=>$x['art_names']]
);
?>

<form
id="menunain"
action="/adminpanel/articles/updateart/<?php echo $x['art_id']; ?>"
method="post">

    <div
    class="mt-4 row">
        <?php
        $controller->inputs(
            [
                'type' => 'hidden',
                'name' => 'update_art_id',
                'value' => $x['art_id'],


            ]
        );
        $controller->inputs(
            [
                'type' => 'submit',
                'name' => 'update_art_save',
                'value' => 'Сохранить',


            ]
        );
        $controller->getLinck(
            [
                'saveurls' => '/adminpanel/articles/articles',
                'savenames' => 'Закрыть',

            ]
        );
        ?>
    </div>
    <div
    class="row">
        <div
        class="col">
            <?php
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Название',
                    'name' => 'names',
                    'value' => $x['art_names']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias',
                    'value' => $x['art_alias']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title',
                    'value' => $x['art_title']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords',
                    'value' => $x['art_keyword']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание страницы',
                    'name' => 'description',
                    'id' => 'description',
                    'value' => $x['art_description']
                ]
            );
            $controller->includer(
                true,
                true,
                './admin/template/redactor.php',
                $controller,
                html_entity_decode($x['art_subcontent'], ENT_HTML5),
                html_entity_decode($x['art_content'], ENT_HTML5)
            );
            ?>
        </div>
    </div>
</form>