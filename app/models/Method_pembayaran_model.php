<?php

class Method_pembayaran_model
{
    private $table = 'metode_pembayaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPembayaranById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE methodp_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
