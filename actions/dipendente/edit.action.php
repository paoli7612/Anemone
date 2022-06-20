<?php

    use App\core\Auth;

    Auth::$dipendente->update([
        'id_tema' => $_POST['id_tema'],
        'slug' => $_POST['slug']
    ]);

    header('Location: /dipendente/settings');