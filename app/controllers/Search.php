<?php

class Search extends Controller
{
    public function index()
    {
        $data['judul'] = "Rara Bakery";

        if (isset($_POST['keyword']))
            $data['bolu'] = $this->model('barang_model')->getCakeByKeyword($_POST['keyword']);
        else if (!isset($_POST['katid']))
            $data['bolu'] = $this->model('barang_model')->getCake();

        if (empty($data['bolu']) && isset($_POST['katid'])) {
            $data['bolu'] = $this->model('barang_model')->getCakeByKategori($_POST['katid']);
        }
        if (empty($data['bolu'])) {
            $katid = $this->model('Kategori_model')->getKategoriByKeyword($_POST['keyword']);
            $data['bolu'] = $this->model('barang_model')->getCakeByKategori($katid);
        }
        $this->view('templates/header', $data);
        if (Auth::loggedin()) {
            $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);
            $this->view('templates/navbar', $data['user']);
        } else {
            $this->view('templates/navbar');
        }

        $this->view('templates/hero');

        $this->view('search/index', $data);

        $this->view('templates/footerview');
        $this->view('templates/footer');
    }
}
