<?php

class Register extends Controller
{
    public function index($email = '')
    {
        if (!Auth::loggedin()) {
            $data['judul'] = "Rara Bakery | Register";
            $data['email'] = $email;
            $this->view('login/master/header', $data);
            $this->view('login/register', $data);
            $this->view('login/master/footer');
        } else {
            header("location:" . BASEURL . "/public/home");
        }
    }

    public function generateVerify()
    {
        // $data['msg'] = "Email sudah digunakan";
        if ($this->model('User_model')->foundmail($_POST['email']) > 0) {
            $data['msg'] = "Email sudah digunakan";
            echo json_encode($data);
        } else {
            // $data['msg'] = "Email  masuk";
            // echo json_encode($data);
            if ($this->model('User_model')->foundVerifyCodeMail($_POST['email']) > 0) {
                $data['msg'] = "Email sudah digunakan";
                echo json_encode($data);
            } else {
                $this->model('User_model')->createVerifyCode($_POST);
                $data['msg'] = "";
                echo json_encode($data);
            }
        }
    }

    public function verify($email = "email@domain.com")
    {
        if (!Auth::loggedin()) {
            $data['judul'] = "Rara Bakery | verify";
            $data['email'] = $email;
            $this->view('login/master/header', $data);
            $this->view('login/verif', $data);
            $this->view('login/master/footer');
        } else {
            header("location:" . BASEURL . "/public/home");
        }
    }
    public function verifyCode()
    {
        if ($this->model('User_model')->checkVerifyCode($_POST)) {
            $data['msg'] = "";
            $_SESSION['verif-success'] = true;
            $_SESSION['email'] = $_POST['email'];
            echo json_encode($data);
        } else {
            $data['msg'] = "Code Salah";
            // 
            echo json_encode($data);
        }
    }

    public function regist()
    {
        if ($this->model('Alamat_model')->createAlamat() > 0) {
            if ($this->model('User_model')->register($_POST) > 0) {
                $data['msg'] = "";
                $_SESSION['email'];
                unset($_SESSION['verif-success']);
                $_SESSION["login"] = true;
                header("location:" . BASEURL . "/public/home");
                exit;
            } else {
            }
        }
    }
}
