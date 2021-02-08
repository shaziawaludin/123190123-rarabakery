<?php

class Kategori_model
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKategoriByKeyword($keyword)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE kategori_nama LIKE :kategori_nama");
        $this->db->bind(':kategori_nama', "%$keyword%");
        $result = $this->db->single();
        return $result['kategori_id'];
    }
}
