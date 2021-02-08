<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = "Rara Bakery";
        $data['bolu'] = $this->model('Barang_model')->getCake();

        $this->view('templates/header', $data);
        if (Auth::loggedin()) {
            $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);
            $this->view('templates/navbar', $data['user']);
        } else {
            $this->view('templates/navbar');
        }
        $this->view('templates/hero');

        $this->view('home/index', $data);

        $this->view('templates/footerview');
        $this->view('templates/footer');
    }
}
