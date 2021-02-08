<?php

class Alamat_model
{
    private $table = 'alamat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createAlamat(
        $nama_penerima = '',
        $telp_penerima = '',
        $kota = '',
        $kode_pos = '',
        $alamat = ''
    ) {
        $query = "INSERT INTO {$this->table} 
        VALUES
        ('',:nama_penerima,:telp_penerima,:kota,:kode_pos,:alamat)";
        $this->db->query($query);
        $this->db->bind(':nama_penerima', $nama_penerima);
        $this->db->bind(':telp_penerima', $telp_penerima);
        $this->db->bind(':kota', $kota);
        $this->db->bind(':kode_pos', $kode_pos);
        $this->db->bind(':alamat', $alamat);
        $this->db->execute();

        // $query = "SELECT LAST_INSERT_ID()";
        // $this->db->query($query);
        // $this->db->execute();

        $_SESSION['alamat_id'] =  $this->db->lastInsertId();

        return $this->db->rowCount();
    }

    public function editAlamat(
        $alamat_id,
        $nama_penerima = '',
        $telp_penerima = '',
        $kota = '',
        $kode_pos = '',
        $alamat = ''
    ) {
        $query = "UPDATE {$this->table} 
        SET nama_penerima =:nama_penerima,
        telp_penerima =:telp_penerima,
        kota=:kota,
        kode_pos=:kode_pos,
        alamat=:alamat 
        WHERE alamat_id = :alamat_id;";

        $this->db->query($query);
        $this->db->bind(':nama_penerima', $nama_penerima);
        $this->db->bind(':telp_penerima', $telp_penerima);
        $this->db->bind(':kota', $kota);
        $this->db->bind(':kode_pos', $kode_pos);
        $this->db->bind(':alamat', $alamat);
        $this->db->bind(':alamat_id', $alamat_id);
        $this->db->execute();



        return $this->db->rowCount();
    }

    public function getAlamatById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE alamat_id= :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
