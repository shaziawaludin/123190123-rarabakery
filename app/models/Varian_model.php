<?php

class Varian_model
{
    private $table = 'varian';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getVarianByPId($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE barang_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->resutlSet();
    }
    public function getVarianById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE varian_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
