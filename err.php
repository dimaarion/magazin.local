<?php
require_once "./template/function.php"; ?>
<!DOCTYPE HTML>
<html lang="ru">

<head>
      <?php $controller->includer(true, true, './template/header.php', $controller, $controller->dirExt('css'), $controller->dirExt('js'), $menu_alias, $artRow); ?>
</head>

<body>
      <?php
      $controller->includer(true, true, './template/menu.php', $controller, $menu_class, $menu_alias);
echo '<h1>Ошибка 404!</h1><h5>Такой страницы не существует</h5>';
      $controller->includer(true, true, './template/footer.php', $controller);
      ?>

</body>

</html>