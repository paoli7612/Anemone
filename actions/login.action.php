<?php

use App\core\Auth;

if (Auth::login($_POST['email'], $_POST['password']))
    header('Location: /');
else {
    $_SESSION['error'] = 'Email o password errati';
    header('Location: /login');

}

