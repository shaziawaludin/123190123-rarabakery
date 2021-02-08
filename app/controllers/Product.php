<?php

class Product extends Controller
{
    public function index($id = 0)
    {
        if ($id != 0) {
            $data['judul'] = "Rara Bakery";
            $data['recomend'] = $this->model('Barang_model')->getCake(12);
            $data['recomend2'] = $this->model('Barang_model')->getCake(6);
            $data['bolu'] = $this->model('Barang_model')->getCakeById($id);
            if ($data['bolu'] == '') {
                header("Location:" . BASEURL . "/home");
                exit;
            }
            $data['varian'] = $this->model('Varian_model')->getVarianByPId($id);

            $this->view('templates/header', $data);
            if (Auth::loggedin()) {
                $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);
                $this->view('templates/navbar', $data['user']);
            } else {
                $this->view('templates/navbar');
            }

            $this->view('product/index', $data);

            $this->view('templates/footerview');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/home");
        }
    }
    public function cart()
    {
    }
}
