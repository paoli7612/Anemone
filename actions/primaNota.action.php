<?php

use App\core\Router;
use App\Models\PrimaNota;

try {
    $primaNota = PrimaNota::getBy('data', $_POST['data']);
    $primaNota->update($_POST);
} catch (Exception $th) {
    PrimaNota::create(array_keys($_POST), array_values($_POST));
}
Router::redirect('primaNota');
