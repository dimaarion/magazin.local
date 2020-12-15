<?php
class Menu
{
    public $props = [];
    public $array_menu;
    public $menu = array();



    public function getMenu()
    {
        $arr =  $this->props;
        foreach ($arr as $key => $value) {
            $this->menu[$value['parent_id']][$value['menu_id']] = $value;
        }
        $treeElem = $this->menu[0];
        $this->genElement($treeElem, $this->menu);
        return $treeElem;
    }
    public function genElement(&$treeElem, $menu)
    {
        $arrMenu = $treeElem;
        if (!isset($arrMenu)) {
            $arrMenu = [];
        }
        foreach ($arrMenu as $key => $value) {
            if (!isset($value['cild'])) {
                $treeElem[$key]['cild'] = array();
            }
            if (array_key_exists($key, $menu)) {
                $treeElem[$key]['cild'] = $menu[$key];
                $this->genElement($treeElem[$key]['cild'], $this->menu);
            }
        }
    }
    public function child($x, $u)
    {
        foreach ($x as $key => $value) {
            echo  '<li class="pod nav"><a href="/' . $value['alias'] . '" class="nav-link pb-0 pl-0 ml-0">' . $value['names'] . '</a>';
            if ($value['cild']) :
                echo '<ul>';
                $this->child($value['cild'], $u);
                echo '</ul>';
                echo '</li>';
            endif;
        }
    }
    public function menu_recursions($alias = '', $color_active = '')
    {
        $arrMenu = $this->getMenu();
        if (!isset($arrMenu)) {
            $arrMenu = [];
        }

        foreach ($arrMenu as $key => $value) {

            if ($value['alias'] == $alias) {
                $c = $color_active;
            } else {
                $c = '';
            }

            if($value['alias'] == '/'){
                $a = $value['alias'];
            }else{
                $a = '/'.$value['alias'];
            }
           
                echo '<li class="nav-item top"><a class="nav-link" ' . $c . '  href="' . $a . '">' . $value['names'] . '</a>';
                if ($value['cild']) :
                    echo '<ul class = "menu_pod">';
                    $this->child($value['cild'], $value['alias']);
                    echo '</ul>';
                    echo '</li>';
                endif;
            
        }
    }
}
