<?php

class Barang_model
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCake($n = 20)
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY RAND() LIMIT {$n}");
        return $this->db->resutlSet();
    }
    public function getCakeById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE barang_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getCakeByKeyword($keyword, $min = 0, $max = 999999999999999)
    {
        $this->db->query("SELECT * FROM {$this->table} 
        WHERE barang_nama LIKE :keyword 
        AND barang_harga BETWEEN :minimum AND :maximum");
        $this->db->bind(':keyword', "%$keyword%");
        $this->db->bind(':minimum', $min);
        $this->db->bind(':maximum', $max);

        return $this->db->resutlSet();
    }
    public function getCakeByKategori($id)
    {
        $this->db->query("SELECT * FROM {$this->table} 
        WHERE kategori_id =:id");
        $this->db->bind(':id', "$id");

        return $this->db->resutlSet();
    }
}
