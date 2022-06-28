<?php

    if ($_POST['password'] != $_POST['confirm'])
        throw new Exception("Password ripetuta non corretta", 1);

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password']

    Dipendente::create($nome, $cognome, $email, $password);
