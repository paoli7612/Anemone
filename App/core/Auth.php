<?php

namespace App\core;

use App\Models\Utente;

class Auth
{
    public static $utente;

    public static function init()
    {
        if (isset($_SESSION['login_id'])) {
            $utenti = Database::query("SELECT utenti.*, temi.colore as tema
                                        FROM utenti
                                        LEFT JOIN temi ON temi.id=utenti.id_tema
                                        WHERE utenti.id=" . $_SESSION['login_id'], Utente::class);
            if (count($utenti) == 1) {
                Auth::$utente = $utenti[0];
                if (!Auth::$utente->id_tema) {
                    Auth::$utente->id_tema=1;
                    Auth::$utente->tema="green";
                }
            }
            else {
                Auth::$utente = null;
            }
            
        }
    }

    public static function theme()
    {
        if (Auth::$utente)
            return Auth::$utente->tema;
        else
            return 'green';
    }

    public static function login($email, $password)
    {
        $utenti = Database::query(
            "SELECT * FROM utenti
            WHERE `email`='$email'
            AND `password`=SHA('$password')",
            Utente::class
        );
        if (count($utenti) == 1) {
            $id = $utenti[0]->id;
            $_SESSION['login_id'] = $id;
            return true;
        } else {
            return false;
        }
    }
    public static function logout()
    {
        session_destroy();
    }

    public static function amministratore()
    {
        if (Auth::$utente)
        {
            return Auth::$utente->isAmministratore;
        }
    }
}
