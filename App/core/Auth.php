<?php
    namespace App\core;

use App\Models\Dipendente;
    class Auth
    {
        private static $login_id;
        public static $dipendente;
        
        public static function init()
        {
            Auth::$login_id = 0;
            if (isset($_SESSION['login_id']))
            {
                Auth::$login_id = $_SESSION['login_id'];
                $dipendente = Database::query("SELECT dipendenti.*, temi.colore as tema
                                            FROM dipendenti
                                            LEFT JOIN temi ON temi.id=dipendenti.id_tema
                                            WHERE dipendenti.id=" . Auth::$login_id, Dipendente::class);
                if ($dipendente[0]->tema == null)
                    $dipendente[0]->tema = 'green';
                if (count($dipendente) == 1)
                    Auth::$dipendente = $dipendente[0];
                else Auth::$dipendente = null;

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

        public static function admin() {
            return Auth::$dipendente->isAmministratore;
        }
    }
