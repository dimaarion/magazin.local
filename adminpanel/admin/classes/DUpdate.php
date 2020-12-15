<?php
class DUpdate
{
    public $db;
    public $tables;
    public $column = [];
    public $paste = [];
    public $id;
    public $err;

    public function __construct($tables, $column, $paste, $id)
    {
        $this->db = new Database();
        $this->tables = $tables;
        $this->column = $column;
        $this->paste = $paste;
        $this->id = $id;
        $this->DQuery();
    }

    public function DQuery()
    {

        $tables = $this->tables;
        $column = $this->column;
        $paste = $this->paste;
        $id = $this->id;
        if (count($column) - 1 ==  count($paste)) {
            if ($id > 0) {
                array_push($paste, $id);
                $id = array_pop($column) . '=?';
                $columnv = implode('=?,', $column);
                $columnv = $columnv . '=?';
                $this->db->updateRow("UPDATE $tables SET $columnv WHERE $id", $paste);
                $this->db->Disconnect();
                $this->err = 1;
            } else {
                $this->err = 01;
            }
        } else {
            $this->err = 02;
        }
    }
}
