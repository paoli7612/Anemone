<?php
    namespace App\core;
    use App\Models\User;
    class Auth
    {
        private static $login_id;
        public static User $user;
        
        public static function init()
        {
            Auth::$login_id = 0;
            if (isset($_SESSION['login_id']))
            {
                Auth::$login_id = $_SESSION['login_id'];
                Auth::$user = Database::query("SELECT utenti.*, temi.nome as tema
                                                FROM utenti, temi
                                                WHERE temi.id=utenti.idTema AND utenti.id=" . Auth::$login_id, User::class)[0];
            }
        }

        public static function logout() 
        {
            session_destroy();
        }

        public static function check()
        {
            if (Auth::$login_id == 0)
            {
                return false;
            }
            else return true;
        }

        public static function login($username, $password)
        {
            $utenti = Database::query("SELECT * FROM utenti WHERE `username`='$username' AND `password`=SHA('$password')", User::class);
            if (count($utenti) == 1)
            {
                $id = $utenti[0]->id;
                Auth::$login_id = $id;
                $_SESSION['login_id'] = $id;
                return true;
            }
            else
            {
                return false;
            }
        }

        public static function id()
        {
            return Auth::$login_id;
        } 

    }
