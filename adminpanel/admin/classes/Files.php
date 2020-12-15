<?php
class Files
{
    public function getImg($d)
    {
        $img = scandir($d);
        $s = [];
        for ($i = 2; $i < count($img); $i++) {
            $s[$i] = $img[$i];
        }
        return   $s;
    }

    public function deleteFiles()
    {
        $sansize = new Sansize();
        $idfiles = $sansize->getrequest('idfiles');
        if (is_file($idfiles)) {
            if ($idfiles) {
                if (@unlink($idfiles)) {
                    return 'Файл ' . $idfiles . ' успешно удален.';
                } else {
                    return 'Ошибка удаления файла.';
                }
            }
        }else{
            
        }
    }
}
