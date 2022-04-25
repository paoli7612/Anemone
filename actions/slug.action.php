<?php

    use App\core\Auth;
    if (Auth::check() && isset($_POST['slug']))
    {
        $user = Auth::$user;
        $user->update(['slug' => $_POST['slug']]);
    }
    header("Location: /user");

?>
