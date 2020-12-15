<?php
spl_autoload_register(function ($className) {
    require './admin/classes/' . $className . '.php';
});

$controller  = new Controller();
$sansize = new Sansize();
//Переменные
$page = $sansize->getrequest('page');
$id = $sansize->getrequest('id');
$id2 = $sansize->getrequest('id2');
$id3 = $sansize->getrequest('id3');
$delid = $sansize->getrequest('delid');
$nmenu = $sansize->getrequest('nmenu');
$controller->id = $sansize->getrequest('id');
$controller->nmenu = $sansize->getrequest('nmenu');
$controller->page = $sansize->getrequest('page');
//меню
$new_menu_select = new DSelect('menu');
$update_menu_select = new DSelect('menu');
$update_menu_parent_select = new DSelect('menu');
$new_menu = $new_menu_select->queryRows();
$menu_update = $update_menu_select->queryRow('menu_id', $id);

//Статьи
$art_select = new DSelect('article');
$art_select_id = new DSelect('article');
$article = $art_select->queryRows();
$article_id =  $art_select_id->queryRow('art_id', $id);
//calculator
$calculator_select_tide = new DSelect('tide');
$calculator_select_grid = new DSelect('grid');
$calculator_select_profile = new DSelect('prais');
$sill = $calculator_select_grid->queryRows();
$tide = $calculator_select_tide->queryRows();

//Меню + Статьи
$art_menu_select = new DSelect('menu,article,art_menu');
$art_menu = $art_menu_select->queryRowWhere('menu.menu_id = art_menu.menu AND art_id = art_menu.articles AND menu.menu_id =' . $id);
// создание и редактирование таблиц
$controller->createTables();
$controller->insertTable($sansize);
$controller->deleteTable($sansize);
//Загрузка файла

$files_upload = new DUpload('files', '/img/upload/');
$images = $files_upload->getImg('/img/upload');
//Удаление файла

$filesClass = new Files();
$filesClass->deleteFiles();
//----------------------------------------------------------------------------------------------------------------------------

$controller->redirects($id, 'new', '/adminpanel/menu/menu');
$controller->redirects($nmenu, 'newart', '/adminpanel/articles/articles');
$controller->redirects($nmenu, 'load', '/adminpanel/files');
//phpinfo();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php $controller->includer(true, true, './admin/template/header.php', $controller, $controller->dirExt('css'), $controller->dirExt('js'), 'Административная панель сайта'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php $controller->includer(true, true, './admin/template/logo.php', $controller, 'Административная панель сайта'); ?>
            </div>
            <div class="col">
                <?php $controller->includer(true, true, './admin/template/menutop.php', $controller); ?>
            </div>
        </div>

        <?php
        $test = 'test';
        $controller->includer($nmenu, 'menu', './admin/template/menumain.php', $controller, $new_menu,  $x2, $arr, $row, $id);
        $controller->includer($nmenu, 'newmenu', './admin/template/newmenu.php', $controller, $x, $x2, $new_menu, $row, $id);
        $controller->includer($nmenu, 'updatemenu', './admin/template/menuupdate.php', $controller, $art_menu, $article, $update_menu_parent_select, $menu_update, $id, $new_menu);
        $controller->includer($nmenu, 'articles', './admin/template/artmain.php', $controller, $article, $x2, $arr, $row, $id);
        $controller->includer($nmenu, 'artnew', './admin/template/artnew.php', $controller);
        $controller->includer($nmenu, 'updateart', './admin/template/artupdate.php', $controller, $article_id);
        $controller->includer($page, 'files', './admin/template/files.php', $controller, $images);
        $controller->includer($nmenu, 'artnew', './admin/template/files.php', $controller, $images);
        $controller->includer($nmenu, 'updateart', './admin/template/files.php', $controller, $images);

        ?>
    </div>
    <?php $controller->includer(true, true, './admin/template/footer.php', $controller); ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>