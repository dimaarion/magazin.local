 <div>
     <?php $controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Статьи', 'добавить статью'); ?>
     <form id="menunain" action="/adminpanel/articles/newart" method="post">
         <div class="mt-4 row">
             <?php

                $controller->inputs(
                    [
                        'type' => 'submit',
                        'name' => 'new_art_save',
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
                            'names' => 'Краткое описание страницы',
                            'name' => 'description',
                            'id' => 'description'
                        ]
                    );


                    $controller->includer(true, true, './admin/template/redactor.php', $controller,'','');
                    ?>                
             </div>
         </div>
     </form>
 </div>