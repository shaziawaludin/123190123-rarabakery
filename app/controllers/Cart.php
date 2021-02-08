<?php

class Cart extends Controller
{
    public function index()
    {
        if (Auth::loggedin()) {
            $data['judul'] = "Rara Bakery";
            $user_id = $this->model('User_model')->getUserIdByEmail($_SESSION['email']);

            $data['keranjang'] = $this->model('Cart_model')->getItemsCart($user_id);

            // id
            // user_id
            // barang_id
            // varian_id
            // barang_jumlah
            // catatan
            $i = 0;
            foreach ($data['keranjang'] as $item) {
                $varian = $this->model('Varian_model')->getVarianById($item['varian_id']);
                $data['keranjang'][$i]['varian_nama'] = $varian['varian_nama'];

                $barang = $this->model('Barang_model')->getCakeById($item['barang_id']);
                $data['keranjang'][$i]['barang_nama'] = $barang['barang_nama'];
                $data['keranjang'][$i]['barang_harga'] = $barang['barang_harga'];
                $data['keranjang'][$i]['barang_foto'] = $barang['foto1'];
                $i++;
            }

            $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);

            $this->view('templates/header', $data);
            $this->view('templates/navbar', $data['user']);

            $this->view('keranjang/index', $data);

            $this->view('templates/footerview');
            $this->view('templates/footer');
        } else {
            header("location: home");
        }
    }

    public function addCart()
    {
        $user_id = $this->model('User_model')->getUserIdByEmail($_SESSION['email']);
        // $user_id, $barang_id, $varian_id, $barang_jumlah, $catatan = ''
        if ($this->model('Cart_model')
            ->createOrderTemp(
                $user_id,
                $_POST['barang_id'],
                $_POST['varian'],
                $_POST['qty'],
                $_POST['catatan']
            )
        ) {
            $data['msg'] = "Berhasil Ditambahkan";
            echo json_encode($data);
        } else {
            $data['msg'] = "Gagal Ditambahkan";
            echo json_encode($data);
        }
    }
    public function hapus($tid)
    {
        if ($this->model('cart_model')->hapusItemCart($tid) > 0) {
            header("location:" . BASEURL . "/cart");
        } else {
            header("location:" . BASEURL . "/cart");
        }
    }
}
