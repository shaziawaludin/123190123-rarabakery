<?php
class Login extends Controller
{
    public function index()
    {

        if (!Auth::loggedin()) {
            $data['judul'] = "Rara Bakery | Login";
            $this->view('login/master/header', $data);
            $this->view('login/Login');
            $this->view('login/master/footer');
        } else {
            header("location:" . BASEURL);
            exit;
        }
    }

    public function loginVerify()
    {
        if (!Auth::loggedin()) {
            if (isset($_POST['email'])) {
                if ($this->model('User_model')->foundmail($_POST['email']) > 0) {
                    if ($this->model('User_model')->checkPassword($_POST)) {
                        $_SESSION["login"] = true;
                        $_SESSION["email"] = $_POST['email'];
                        // header("location:" . BASEURL . "/public/home");
                        // exit;
                        $data['login'] = true;
                        echo json_encode($data);
                    } else {
                        $data['msg2'] = "Password tidak cocok";
                        echo json_encode($data);
                    }
                } else {
                    $data['msg1'] = "Email tidak ditemukan";
                    echo json_encode($data);
                    // $data['msg'] = "Email  masuk";
                    // echo json_encode($data);

                }
            } else {
                header("location:" . BASEURL . "/login");
                exit;
            }
        } else {
            header("location:" . BASEURL . "/home");
            exit;
        }
    }
    public function logout()
    {
        session_destroy();
        header("location:" . BASEURL . "/home");
    }
}
