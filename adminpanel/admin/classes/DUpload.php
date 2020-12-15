<?php
class DUpload
{

    public $rout;
    public $error;
    public $imgdir;
    public $i;
    public $names;
    public $size;

    public function __construct($i, $imgdir)
    {
        $this->imgdir = $imgdir;
        $this->i = $i;
        $this->filesImage();
    }
    public function filesImage()
    {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );


        $param = array('jpg', 'png', 'pdf', 'djvu', 'docx', 'txt', 'doc');
        $image = $this->imgdir;
        $imgDir = $_SERVER['DOCUMENT_ROOT'] . $image;
        @mkdir($imgDir, 0777);
        $data = $_FILES[$this->i];
        if ($data) :
            $tmp = $data['tmp_name'];
            if (is_uploaded_file($tmp)) {
                $n = filter_var($data['name'], FILTER_SANITIZE_STRING);
                $parts = pathinfo($n);
                if (in_array(strtolower($parts['extension']), $param)) {
                    $namef = strtr($n, $converter);
                    $newf = $imgDir . '/' . $namef;
                    @move_uploaded_file($tmp, $newf);
                    $this->rout = $image . '/' . $namef;
                    $this->names = $namef;
                    $this->size = 'Размер файла: ' . round($data['size'] / 1024, 0) . ' мб.';
                    $this->error = 'Файл: ' . $this->names . ' успешно загружен.';
                } else {
                    $this->error = 'Недопустимый тип файла.';
                }
            } else {
                $this->error = 'Ошибка загрузки.';
            }

        endif;
    }

    public function getImg($d)
    {
        $img = scandir($_SERVER['DOCUMENT_ROOT'].$d);
        $s = [];
        for ($i = 2; $i < count($img); $i++) {
            $s[$i] = $img[$i];
        }

        return   $s;
    }
}
