<?php

class Cart_model
{
    private $table = 'order_temp';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createOrderTemp($user_id, $barang_id, $varian_id, $barang_jumlah, $catatan = '')
    {
        $query = "INSERT INTO {$this->table} 
                VALUES
                ('',:user_id,:barang_id,:varian_id,:barang_jumlah,:catatan)";

        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':barang_id', $barang_id);
        $this->db->bind(':varian_id', $varian_id);
        $this->db->bind(':barang_jumlah', $barang_jumlah);
        $this->db->bind(':catatan', $catatan);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getItemsCart($user_id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE user_id= :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resutlSet();
    }
    public function hapusItemCart($cart_id)
    {
        $query = "DELETE FROM {$this->table} WHERE id=:id";

        $this->db->query($query);
        $this->db->bind(':id', $cart_id);
        $this->db->execute();
    }
}
