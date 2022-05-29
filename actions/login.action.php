<?php

    use App\core\Auth;
    if (Auth::login($_POST['email'], $_POST['password']))
        header('Location: /');
    else 
        echo 'ciao'; //header('Location: /login');