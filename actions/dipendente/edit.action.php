<?php

    use App\core\Auth;

    Auth::$dipendente->update(['id_tema' => $_POST['theme']]);

    header('Location: /dipendente/settings');