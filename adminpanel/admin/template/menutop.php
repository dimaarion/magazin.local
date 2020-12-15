 <?php

    $menu = [
        [
            "menu_id" => 1,
            "names" => "Главная",
            "alias" => "adminpanel",
            "parent_id" => 0
        ], [
            "menu_id" => 2,
            "names" => "Меню",
            "alias" => "adminpanel/menu/menu",
            "parent_id" => 0
        ], [
            "menu_id" => 3,
            "names" => "Статьи",
            "alias" => "adminpanel/articles/articles",
            "parent_id" => 0
        ], [
            "menu_id" => 4,
            "names" => "Файлы",
            "alias" => "adminpanel/files",
            "parent_id" => 0
        ]
    ];
    $menu_class = new Menu();
    $menu_class->props = $menu;
    ?>

 <div class="container menu-top">
     <ul class="nav justify-content-end">
         <?php $menu_class->menu_recursions(); ?>
     </ul>
 </div>