<?php

class Pengiriman_model
{
    private $table = 'metode_pengiriman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getPengirimanById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE methodeks_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
