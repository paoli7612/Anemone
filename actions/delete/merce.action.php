<?php
    use App\Models\Merce;
    Merce::delete($_POST['id']);
    header('Location: /inventory');