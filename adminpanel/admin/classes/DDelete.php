<?php
class DDelete
{
    public $db;
    public $tables;
    public $colid;
    public $id = [];
    public $err;


    public function __construct($tables = '', $colid = '', $id = [])
    {
        if ($id == null) {
            $id = [];
        }
        $this->id = '(' . implode(',', $id) . ')';
        $this->db = new Database();
        $this->tables = $tables;
        $this->colid = $colid;
    }

    public function delete()
    {
        $col = $this->colid;
        $tables = $this->tables;
        $id = $this->id;
        if ($id != '()') :
            $this->db->deleteRow("DELETE FROM $tables WHERE $col IN $id");
            $this->db->Disconnect();
            $this->err = 'ok';
        else :
            $this->err = 'no';
        endif;
    }

    public function deleteMenu($delete, $id, $idmenuart)
    {
        if ($delete == 'delete' && isset($id) && isset($idmenuart)) {
            $id = str_replace('delete-', '', $id);
            $this->db->deleteRow("DELETE FROM menu WHERE menu_id = ?", [$id]);
            $this->db->deleteRow("DELETE FROM menu_articles WHERE menu = ?", [$idmenuart]);
            $this->db->Disconnect();
            $this->err = 'ok';
        }else{
            $this->err = 'no';
        }
    }
}
