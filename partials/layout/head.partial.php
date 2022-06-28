<?php

use App\App;
use App\core\Auth;

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gestore gratuito locale e delivery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="Gestore gratuido locali e delivery">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link id="theme_link" rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-<?= Auth::theme() ?>.css">
    <title>Anemone - <?= App::$title ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('/back.png');
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/favicon.ico">