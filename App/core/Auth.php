<?php

namespace App\core;

use App\Models\Account;

class Auth
{
    private static $login_id;
    public static Account $account;

    public static function init()
    {
        Auth::$login_id = 0;
        if (isset($_SESSION['login_id'])) {
            Auth::$login_id = $_SESSION['login_id'];
            $account = Database::query("SELECT accounts.*, themes.name as theme
                                            FROM accounts
                                            LEFT JOIN themes ON themes.id=accounts.idTheme
                                            WHERE accounts.id=" . Auth::$login_id, account::class);
            if ($account[0]->theme == null)
                $account[0]->theme = 'green';
            if (count($account) == 1)
                Auth::$account = $account[0];
            else Auth::$account = null;
        }
    }

    public static function logout()
    {
        session_destroy();
    }

    public static function check()
    {
        if (Auth::$login_id == 0) {
            return false;
        } else return true;
    }

    public static function login($username, $password)
    {
        $dipendenti = Database::query("SELECT * FROM `accounts` WHERE `username`='$username' AND `password`=SHA('$password')", account::class);
        if (count($dipendenti) == 1) {
            $id = $dipendenti[0]->id;
            Auth::$login_id = $id;
            $_SESSION['login_id'] = $id;
            return true;
        } else {
            return false;
        }
    }

    public static function register($username, $email, $password)
    {
        Database::query("INSERT INTO `accounts` (`username`, `email`, `password`) VALUES ('$username', '$email', SHA('$password'));");
        Auth::login($username, $password);
    }

    public static function id()
    {
        return Auth::$login_id;
    }

    public static function admin()
    {
        return Auth::$account->isAdmin;
    }
}
