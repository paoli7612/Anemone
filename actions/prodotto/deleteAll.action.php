<?php
    use App\Models\Prodotto;
    Prodotto::deleteAll();
    header("Location: /dipendente/settings");