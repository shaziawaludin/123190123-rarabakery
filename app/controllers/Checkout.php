<?php

class Checkout extends Controller
{
    public function index()
    {
        if (Auth::loggedin()) {
            $data['judul'] = "Rara Bakery";

            if (isset($_POST['barang_id']) || isset($_POST['cartId'])) {
                $userAlamatId = $this->model('User_model')->getAlamatId($_SESSION['email']);
                if ($userAlamatId != 0) {
                    $data['alamat'] = $this->model('Alamat_model')->getAlamatById($userAlamatId);
                }

                if (!isset($_POST['cartId'])) {
                    if (!(is_array($_POST['barang_id']))) {

                        $data['bolu'][0]
                            = $this
                            ->model('Barang_model')
                            ->getCakeById($_POST['barang_id']);

                        $data['bolu'][0]['varian']
                            = $this
                            ->model('Varian_model')
                            ->getVarianById($_POST['varian']);

                        $data['bolu'][0]['qty']
                            = $_POST['qty'];

                        $data['bolu'][0]['catatan']
                            = $_POST['catatan'];

                        $data['bolu'][0]['methodp']
                            = $this
                            ->model('Method_pengiriman_model')
                            ->getMethodP();
                    } else {
                        header("location:" . BASEURL . '/cart');
                        exit;
                    }
                } else {
                    $barang_id = $_POST['barang_id'];
                    $varian_id = $_POST['varian_id'];
                    $cartId = $_POST['cartId'];
                    $catatan = $_POST['catatan'];
                    $barang_jumlah = $_POST['barang_jumlah'];
                    $i = 0;
                    foreach ($cartId as $cid) {
                        $data['bolu'][$i]
                            = $this
                            ->model('Barang_model')
                            ->getCakeById($barang_id[(int)$cid]);

                        $data['bolu'][$i]['varian']
                            = $this
                            ->model('Varian_model')
                            ->getVarianById($varian_id[(int)$cid]);

                        $data['bolu'][$i]['qty']
                            = $barang_jumlah[(int)$cid];

                        $data['bolu'][$i]['catatan']
                            = $catatan[(int)$cid];

                        $data['bolu'][$i]['methodp']
                            = $this
                            ->model('Method_pengiriman_model')
                            ->getMethodP();
                        $data['bolu'][$i]['cartid'] = $cid;
                        $i++;
                    }
                    $data['test'] = $_POST;
                    $data['test'] = $cartId;
                }

                $this->view('templates/header', $data);
                $this->view('templates/navbarcheckout');

                $this->view('checkout/index', $data);

                $this->view('templates/footercheckout');
                $this->view('templates/footer');
            } else {
                header("location:" . BASEURL);
                exit;
            }
        } else {
            header("location: login");
            exit;
        }
    }

    public function ccode()
    {

        if (Auth::loggedin()) {
            $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);

            if (isset($_POST['barang_id'])) {
                $i = 0;
                $user_id = $this->model('User_model')->getUserIdByEmail($_SESSION['email']);
                $data['forview'] = $_POST;
                $data['total_ongkir'] = 0;
                $data['total_barang'] = 0;
                $data['total_harga_barang'] = 0;
                if ($this->model('Order_model')->createOrder($user_id)) {
                    $data['ordertable_id'] = $this->model('Order_model')->getOrderIdByCode($_SESSION['ccode']);
                    $data['ordertable_id'] = $data['ordertable_id']['order_id'];

                    foreach ($_POST['barang_id'] as $barang_id) {
                        $barang = $this->model('Barang_model')->getCakeById($barang_id);
                        $data['barang_nama'] = $barang['barang_nama'];
                        $data['forview']['nama_barang_dibeli'][] = $data['barang_nama'];

                        $data['barang_harga'] = (int)$barang['barang_harga'];
                        $data['forview']['harga_barang_dibeli'][] = (int)$data['barang_harga'];

                        $data['barang_id'] = $barang['barang_id'];
                        $data['varian_id'] = $barang_id;
                        $data['barang_jumlah'] = (int)$_POST['barang_jumlah'][$i];
                        $data['total_barang'] += (int)$data['barang_jumlah'];
                        $data['forview']['total_barang_dibeli'][] = (int)$data['barang_jumlah'];
                        $data['catatan'] = $_POST['barang_catatan'][$i];

                        $userAlamat = $this->model('Alamat_model')->getAlamatById($_POST['alamat_id']);
                        $data['alamat_pengiriman'] = $userAlamat['alamat'];
                        $data['nama_penerima'] = $userAlamat['nama_penerima'];

                        $data['pembayaran_method_id'] = $_POST['pembayaran_method_id'];
                        $userPembayaran = $this->model('Method_pembayaran_model')->getPembayaranById($_POST['pembayaran_method_id']);
                        $data['pembayaran_biaya'] = (int)$userPembayaran['methodp_biaya'];
                        $data['namaPembayaran'] = $userPembayaran['methodp_nama'];
                        $data['logoPembayaran'] = $userPembayaran['methodp_foto'];


                        $userPengiriman = $this->model('Method_Pengiriman_model')->getPengirimanById($_POST['pengiriman_id'][$i]);
                        $data['pengiriman_id'] = $_POST['pengiriman_id'][$i];
                        $data['ongkir'] = (int)$userPengiriman['methodeks_ongkir'];
                        $data['forview']['ongkir_barang_dibeli'][] = (int)$data['ongkir'];
                        $data['forview']['methodeks_barang_dibeli'][] = $userPengiriman['methodeks_nama'];

                        $data['total_ongkir'] += (int)$data['ongkir'];
                        $data['total_pembayaran'] = (int)$data['barang_harga']
                            * (int)$data['barang_jumlah']
                            + (int)$data['ongkir'];
                        $data['total_harga_barang'] += (int)$data['barang_harga']
                            * (int)$data['barang_jumlah'];
                        $this->model('Order_detail_model')->createOrderDetail($data);

                        $this->model('cart_model')->hapusItemCart($_POST['cartid'][$i]);
                        $i++;
                    }
                }


                $data['judul'] = "Rara Bakery";
                $this->view('templates/header', $data);
                $this->view('templates/navbar', $data['user']);

                $this->view('checkout/ccheckout', $data);

                $this->view('templates/footerview');
                $this->view('templates/footer');
            } else {
                header("location: " . BASEURL);
            }
        } else {
            header("location: login");
            exit;
        }
    }
}
