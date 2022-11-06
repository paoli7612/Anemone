<?php

    use App\core\Auth;
    Auth::logout();
    header('Location: /');