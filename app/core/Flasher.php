<?php

class Flasher
{
    public static function setFlash($msg, $action, $type)
    {
        $_SESSION['flash'] = [
            'pesan' => $msg,
            'aksi' => $action,
            'tipe' => $type
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert"> Data Mahasiswa
            <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['flash']);
        }
    }
}
