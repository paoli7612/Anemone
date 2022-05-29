<?php
    namespace App\core;

use App\Models\Dipendente;
use App\Models\User;
    class Auth
    {
        private static $login_id;
        public static $user;
        
        public static function init()
        {
            Auth::$login_id = 0;
            if (isset($_SESSION['login_id']))
            {+
                Auth::$login_id = $_SESSION['login_id'];
                $dipendente = Database::query("SELECT dipendenti.*, temi.colore as tema
                                            FROM dipendenti
                                            LEFT JOIN temi ON temi.id=dipendenti.id_tema
                                            WHERE dipendenti.id=" . Auth::$login_id, Dipendente::class);
                if (count($dipendente) == 1)
                    Auth::$user = [0];
                else Auth::$user = null;

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

        public static function login($email, $password)
        {
            $dipendenti = Database::query("SELECT * FROM dipendenti
                                            WHERE `email`='$email'
                                            AND `password`=SHA('$password')",
                                        Dipendente::class);
                                        echo 'if';
            print_r($dipendenti);
            if (count($dipendenti) == 1)
            {
                $id = $dipendenti[0]->id;
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
