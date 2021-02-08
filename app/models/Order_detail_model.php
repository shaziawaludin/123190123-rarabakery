<?php

class Order_detail_model
{
    private $table = 'order_detail';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createOrderDetail($data)
    {
        $query = "INSERT INTO {$this->table} 
                VALUES
                ('',
                :ordertable_id,
                :barang_id,
                :barang_nama,
                :varian_id,
                :barang_harga,
                :barang_jumlah,
                :pengiriman_id,
                :ongkir,
                :pembayaran_method_id,
                :nama_penerima,
                :alamat_pengiriman,
                :total_pembayaran,
                :catatan
                )";

        $this->db->query($query);
        $this->db->bind(':ordertable_id', $data['ordertable_id']);
        $this->db->bind(':barang_id', $data['barang_id']);
        $this->db->bind(':barang_nama', $data['barang_nama']);
        $this->db->bind(':varian_id', $data['varian_id']);
        $this->db->bind(':barang_harga', $data['barang_harga']);
        $this->db->bind(':barang_jumlah', $data['barang_jumlah']);
        $this->db->bind(':pengiriman_id', $data['pengiriman_id']);
        $this->db->bind(':ongkir', $data['ongkir']);
        $this->db->bind(':pembayaran_method_id', $data['pembayaran_method_id']);
        $this->db->bind(':nama_penerima', $data['nama_penerima']);
        $this->db->bind(':alamat_pengiriman', $data['alamat_pengiriman']);
        $this->db->bind(':total_pembayaran', $data['total_pembayaran']);
        $this->db->bind(':catatan', $data['catatan']);
        $this->db->execute();
        return $this->db->rowCount();
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
}
