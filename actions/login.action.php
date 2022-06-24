<?php

    use App\core\Auth;
    if (Auth::login($_POST['email'], $_POST['password']))
        header('Location: /');
    else 
        header('Location: /');