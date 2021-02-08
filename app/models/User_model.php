<?php

class User_model
{
    private $table = 'users';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserInfoByEmail($email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email=:email");
        $this->db->bind(':email', $email);
        $result = $this->db->single();

        if ($result['jk_id'] != 0) {
            $this->db->query("SELECT * FROM jenis_kelamin WHERE jk_id=:id");
            $this->db->bind(':id', $result['jk_id']);
            $jk =  $this->db->single();

            $result['jk_name'] = $jk['jk'];
        } else {
            $result['jk_name'] = '';
        }

        $result['password'] = '';
        return $result;
    }

    public function getUserIdByEmail($email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email=:email");

        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result['user_id'];
    }

    public function register($data)
    {
        $query = "INSERT INTO {$this->table} 
                    VALUES
                 ('',:nama,:email,:password,'',:alamat_id,'NULL','NULL','NULL')";


        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        // $password = $data['password'];
        $this->db->query($query);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nama', $data['name']);
        $this->db->bind(':password', $password);
        $this->db->bind(':alamat_id', $_SESSION['alamat_id']);
        $this->db->execute();
        // var_dump($data);
        // die;
        return $this->db->rowCount();
    }

    public function foundmail($email)
    {
        $this->db->query("SELECT * FROM $this->table WHERE email=:email");

        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result;
        if ($result != null) {
            return 1;
        } else
            return 0;
    }
    public function foundVerifyCodeMail($email)
    {
        $this->db->query("SELECT * FROM verification WHERE verif_email=:email");

        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result;
        if ($result != null) {
            return 1;
        } else
            return 0;
    }

    public function createVerifyCode($data)
    {
        $query = "INSERT INTO verification 
               VALUES
               (:email,:code)";

        $code = mt_rand(1000, 9999);
        $_SESSION['vcode'] = $code;
        $code = password_hash($code, PASSWORD_DEFAULT);
        $this->db->query($query);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':code', $code);
        $this->db->execute();
        // var_dump($data);
        // die;
        return $this->db->rowCount();
    }
    public function checkVerifyCode($data)
    {
        $this->db->query("SELECT * FROM verification WHERE verif_email=:email");

        $this->db->bind(':email', $data['email']);
        $result = $this->db->single();
        if (password_verify($data['code'], $result['verif_code'])) {
            return true;
        } else
            return false;
    }

    public function checkPassword($data)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email=:email");

        $this->db->bind(':email', $data['email']);
        $result = $this->db->single();
        if (password_verify($data['password'], $result['password'])) {
            return true;
        } else
            return false;
    }

    public function getAlamatId($email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email= :email");
        $this->db->bind(':email', $email);
        $user = $this->db->single();
        return $user['alamat_id'];
    }
}
