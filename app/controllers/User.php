<?php

class User extends Controller
{
    public function index($pg = '')
    {
        if (Auth::loggedin()) {
            $data['judul'] = "Rara Bakery";
            $data['pg'] = $pg;
            $data['user'] = $this->model('User_model')->getUserInfoByEmail($_SESSION['email']);
            if ($pg = 'alamat') {
                $data['alamat'] = $this->model('Alamat_model')->getAlamatById($data['user']['alamat_id']);

                if (
                    $data['alamat']['nama_penerima'] == ''
                    && $data['alamat']['telp_penerima'] == ''
                    && $data['alamat']['kota'] == ''
                    && $data['alamat']['kode_pos'] == ''
                    && $data['alamat']['alamat'] == ''
                ) {
                    $data['form-judul'] = 'tambah';
                } else {
                    $data['form-judul'] = 'edit';
                }


                if (isset($_POST['submitalamat'])) {
                    if (
                        $this->model('alamat_model')
                        ->editAlamat(
                            $data['user']['alamat_id'],
                            $_POST['nama_penerima'],
                            $_POST['telp_penerima'],
                            $_POST['kota'],
                            $_POST['kode_pos'],
                            $_POST['alamat']
                        ) > 0
                    ) {
                        $data['form-judul'] = 'edit';
                        $data['alamat'] = $this->model('Alamat_model')->getAlamatById($data['user']['alamat_id']);
                        Flasher::setFlash('berhasil', 'diubah', 'success');
                    } else {
                        Flasher::setFlash('gagal', 'diubah', 'success');
                    }
                } else {
                }
            }


            $this->view('templates/header', $data);
            $this->view('templates/navbar', $data['user']);

            $this->view('userpage/index', $data);

            $this->view('templates/footerview');
            $this->view('templates/footer');
        } else {
            header("location: login");
        }
    }
}
