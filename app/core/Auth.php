<?php

class Auth
{

    public static function loggedin()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }
}
