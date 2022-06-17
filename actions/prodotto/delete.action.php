<?php

    use App\Models\Prodotto;
    Prodotto::delete($_POST['id']);
    header("Location: /dipendente/settings");