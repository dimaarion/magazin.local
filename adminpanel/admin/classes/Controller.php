<?php
class Controller
{

    public $err;
    public $saveurls;
    public $savenames;
    public $errFiles = 'Такого файла или каталога не существует';
    public $alias;
    public $id;
    public $limit = 4;
    public $nmenu;
    public $page;

    public function inputs($inputs)
    {
        echo '<div class="form-group '
            . $inputs['divclass'] . '">';
        if ($inputs['names']) :
            echo '<label class="col-sm col-form-label '
                . $inputs['labelclass']
                . '" for="'
                . $inputs['name']
                . '"><h5>'
                . $inputs['names']
                . '</h5></label>';
        endif;
        echo '<input ' . $inputs["checked"] . ' value = "'
            . $inputs['value']
            . '" class="form-control form-control-lg '
            . $inputs['inputclass']
            . '" type="'
            . $inputs['type']
            . '" name="'
            . $inputs['name']
            . '" id="'
            . $inputs['name']
            . '"></div>';
    }

    public function inputsCheckbox($inputs)
    {
        echo '<div class="' . $inputs['divclass']
            . '"><input value = "' . $inputs['value']
            . '" class="form-control ' . $inputs['inputclass']
            . '" type="'
            . $inputs['type']
            . '" name="' . $inputs['name']
            . '" id="' . $inputs['id']
            . '"><label class="col-sm col-form-label '
            . $inputs['labelclass']
            . '" for="'
            . $inputs['id']
            . '">'
            . $inputs['names']
            . '</label></div>';
    }
    public function inputsTextarera($inputs)
    {
        echo '<div class="form-group '
            . $inputs['divclass']
            . '"><label class="col-sm col-form-label '
            . $inputs['labelclass']
            . '" for="'
            . $inputs['name']
            . '"><h5>'
            . $inputs['names']
            . '</h5></label><textarea class="form-control form-control-lg '
            . $inputs['inputclass']
            . '"name="' . $inputs['name'] . '" id="'
            . $inputs['id']
            . '">'
            . $inputs['value']
            . '</textarea></div>';
    }

    public function saves($inputs)
    {
        echo  '<div class="row"><div class="col-3">' .
            $this->inputs($inputs)
            . '</div><a href = "'
            . $inputs['saveurls']
            . '" class="col-3"><div class="form-control form-control-lg  text-center">'
            . $inputs['savenames']
            . '</div></a></div>';
    }


    public function getLinck($inputs)
    {
        echo  '<div class="form-group  '
            . $inputs['divclass']
            . '"><a style="display: block;" href = "'
            . $inputs['saveurls']
            . '" class="col"><div class="form-control form-control-lg  text-center">'
            . $inputs['savenames']
            . '</div></a></div>';
    }
    public function dirExt($u)
    {
        if (file_exists($u)) {
            $newdir = [];
            $css = scandir($u);
            foreach ($css as $key => $value) {
                if ($value == '.' || $value == '..') {
                } else {
                    $newdir[$key] = $value;
                }
            }
            return $newdir;
        } else {
            echo $this->errFiles;
        }
    }

    public function dirFileName($nameDir)
    {
        $r =  array_map(function ($x) {
            preg_match('/\w+\.\w+\.\w+\.css|\w+\.\w+\.\w+\.js/', $x, $p);
            return $p[0];
        }, $nameDir);

        return array_unique($r);
    }

    public function createTables()
    {
        $tableMenu = new Database();
        $tableMenu->createTable(
            "CREATE TABLE  menu (
            menu_id INT(6) AUTO_INCREMENT NOT NULL,
            alias VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            names VARCHAR(255) NOT NULL,
            keywords VARCHAR(255) NOT NULL,
            descriptions VARCHAR(255) NOT NULL,
            parent_id int(11) NOT NULL,
            PRIMARY KEY (`menu_id`))"
        );
        $tableMenu->createTable(
            "CREATE TABLE  art_menu (
            art_menu_id INT(6) AUTO_INCREMENT NOT NULL,
            menu int(11) NOT NULL,
            articles int(11) NOT NULL,
            PRIMARY KEY (`art_menu_id`))"
        );

        $tableMenu->createTable(
            "CREATE TABLE  article (
            art_id INT(6) AUTO_INCREMENT NOT NULL,
            art_names VARCHAR(255) NOT NULL,
            art_alias VARCHAR(255) NOT NULL,
            art_title VARCHAR(255) NOT NULL,
            art_keyword VARCHAR(255) NOT NULL,
            art_description VARCHAR(255) NOT NULL,
            art_subcontent text(255) NOT NULL,
            art_content text(255) NOT NULL,
            articles int(11) NOT NULL,
            PRIMARY KEY (`art_id`))"
        );
    }

    public function insertTable($sansize)
    {
        //Добавление пунктов меню
        if (@$_REQUEST['new_menu_save']) {
            $din =  new DInsert(
                'menu',
                [
                    'alias',
                    'title',
                    'names',
                    'keywords',
                    'descriptions',
                    'parent_id'
                ],
                [
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('names'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    $sansize->getrequest('parent_id')
                ]
            );

            $this->err = $din->err;
        }
        // Редактирование меню
        if (@$_REQUEST['update_menu_save']) {
            $din =  new DUpdate(
                'menu',
                [
                    'alias',
                    'title',
                    'names',
                    'keywords',
                    'descriptions',
                    'parent_id',
                    'menu_id'

                ],
                [
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('names'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    $sansize->getrequest('parent_id')
                ],
                $sansize->getrequest('menu')
            );

            $this->err = $din->err;
            header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
        }
        // добавление статьи к меню
        if (@$_REQUEST['update_menu_art_save']) {
            try {
                $din =  new DInsert(
                    'art_menu',
                    [
                        'menu',
                        'articles'

                    ],
                    [
                        $sansize->getrequest('menu'),
                        $sansize->getrequest('articles'),

                    ]
                );
                header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
            } catch (\Throwable $th) {
                $this->err = 'Ошибка добавления статьи';
            }
        }
        // Редактирование статьи
        if (@$_REQUEST['update_art_save']) {
            $din =  new DUpdate(
                'article',
                [
                    'art_names',
                    'art_alias',
                    'art_title',
                    'art_keyword',
                    'art_description',
                    'art_subcontent',
                    'art_content',
                    'art_id'
                ],
                [
                    $sansize->getrequest('names'),
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    htmlentities($_REQUEST['subcontent'], ENT_HTML5),
                    htmlentities($_REQUEST['content'], ENT_HTML5)

                ],
                $sansize->getrequest('update_art_id')
            );

            $this->err = $din->err;
            header('location:/adminpanel/articles/updateart/' . $sansize->getrequest('update_art_id'));
        }
        //Добавление статьи
        if (@$_REQUEST['new_art_save']) {
            $din =  new DInsert(
                'article',
                [
                    'art_names',
                    'art_alias',
                    'art_title',
                    'art_keyword',
                    'art_description',
                    'art_subcontent',
                    'art_content'
                ],
                [
                    $sansize->getrequest('names'),
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    htmlentities($_REQUEST['subcontent'], ENT_HTML5),
                    htmlentities($_REQUEST['content'], ENT_HTML5)

                ]
            );

            $this->err = $din->err;
        }
    }

    public function deleteTable($sansize)
    {
        if ($_REQUEST['delete_menu_id']) {
            $d = new DDelete('menu', 'menu_id', $_REQUEST['delete_menu_id']);
            $d->delete();
            header('location:/adminpanel/menu/menu');
        }
        if ($_REQUEST['update_menu_art_delete']) {
            $d = new DDelete('art_menu', 'articles', [$_REQUEST['menu_articles']]);
            $d->delete();
            header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
        }
        if ($_REQUEST['art_delete']) {
            $d = new DDelete('article', 'art_id', $_REQUEST['delete_art_id']);
            $d->delete();
            header('location:/adminpanel/articles/articles');
        }

        if ($_REQUEST['deleteFiles']) {
            $f = preg_replace('/http:\/\/' . $_SERVER['HTTP_HOST'] . '/', '..', $_REQUEST['deleteFiles']);
            @unlink($f);
        }
    }

    public function includer($request, $ifender, $u, $controller, $x = [], $x2 = [], $arr = [], $row = [], $id = 1, $id2 = [], $x3 = [])
    {
        if ($request == $ifender) {
            return include($u);
        }
    }

    public function redirects($request, $ifender, $u)
    {
        if ($request == $ifender) {
            return header('location:' . $u);
        }
    }

    public function indexPage($alias, $prist)
    {
        if ($alias == '' || $alias == 'page') {
            return '/';
        } else {
            return $alias . $prist;
        }
    }

    public function ifElseContent($value1, $value2)
    {
        if (isset($value1)) {
            return $value1;
        } else {
            return $value2;
        }
    }




    public function twocorrectthird($item1, $item2, $rezult1, $rezult2)
    {
        if ($item1 == $item2) {
            return $rezult1;
        } else {
            return $rezult2;
        }
    }

    public function pagination($a, $b)
    {
        return ($a / $b + ($a % $b > 0 ? 1 : 0));
    }

    public function createFiles($location, $content, $dir = '')
    {
        if ($dir == '') {
            if (file_exists('./' . $location)) {
                $str = file_get_contents('./' . $location);
                if (strcmp($str, $content) != 0) {
                    return file_put_contents('./' . $location, $content);
                }
            } else {
                return file_put_contents('./' . $location, $content);
            }
        } else {
            if (is_dir('./' . $dir)) {
                if (file_exists('./' . $dir . '/' . $location)) {

                    $str = file_get_contents('./' . $dir . '/' . $location);
                    if (strcmp($str, $content) != 0) {
                        return file_put_contents('./' . $dir . '/' . $location, $content);
                    }
                } else {
                    return file_put_contents('./' . $dir . '/' . $location, $content);
                }
            } else {
                mkdir('./' . $dir);
            }
        }
    }

    public function paginationPage($controller, $a, $b)
    {

        if ($a < 1) {
            if ($controller->alias != 'page') {
                return $controller->alias;
            }
        } else {
            if (!$controller->alias) {
                return 'page' . $controller->alias . '/' . $b;
            } else {
                return $controller->alias . '/' . $b;
            }
        }
    }


    public function paginationPlus($controller, $a, $b)
    {

        if (!$controller->alias) {
            return '/page/2';
        } else {
            if ($controller->alias == 'page') {
                if ($controller->id + $a > $b) {
                    return '/';
                } else {
                    return $controller->id + $a;
                }
            } else {
                if (!$controller->id) {
                    return '/' . $controller->alias . '/2';
                } else {
                    if ($controller->id + $a > $b) {
                        return '/' . $controller->alias;
                    } else {
                        return  $controller->id + $a;
                    }
                }
            }
        }
    }
    public function createRobotText()
    {
        return
            'User-agent: Yandex
Allow: /
Disallow: /template/
Disallow: /adminpanel/
Disallow: /img/
Disallow: /image/
Disallow: /js/
Disallow: /index.php
Disallow: /index.php?
Disallow: /?
Disallow: /file/
Disallow: /%


User-agent: *
Allow: /
Sitemap: https://' . $_SERVER['HTTP_HOST'] . '/sitemap/sitemap.xml
Disallow: /template/
Disallow: /adminpanel/
Disallow: /img/
Disallow: /image/
Disallow: /js/
Disallow: /index.php
Disallow: /index.php?
Disallow: /?
Disallow: /file/
Disallow: /%
Host:https://' . $_SERVER['HTTP_HOST'] . '/';
    }

    public function createSitemap($arr = [])
    {
        $d = [];
        foreach ($arr as $key => $value) {
            $d[$key] =  "<url><loc>https://" . $_SERVER['HTTP_HOST'] . "/" . $value['art_alias'] . "</loc></url> \n";
        }
        return
            "<?xml version='1.0' encoding='UTF-8'?>
        <urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'> \n"
            . implode(' ', $d)
            . '</urlset>';
    }
}
