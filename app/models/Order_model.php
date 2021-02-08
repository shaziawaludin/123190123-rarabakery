<?php

class Order_model
{
    private $table = 'ordertable';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createOrder($user_id, $order_status = 4, $pembayaran_status = 1)
    {
        $code = '1230000' . mt_rand(1000, 9999);
        $tanggal = date("Y-m-d");
        $query = "INSERT INTO {$this->table} 
                VALUES
                ('',:user_id,:order_status,:order_tanggal,:pembayaran_status,:kode_pembayaran)";

        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':order_status', $order_status);
        $this->db->bind(':order_tanggal', $tanggal);
        $this->db->bind(':pembayaran_status', $pembayaran_status);
        $this->db->bind(':kode_pembayaran', $code);
        $this->db->execute();

        //ini akan dihapus di luar production
        $_SESSION['ccode'] = $code;
        return $this->db->rowCount();
    }

    public function getOrderIdByCode($code)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE kode_pembayaran= :code");
        $this->db->bind(':code', $code);
        return $this->db->single();
    }
}
