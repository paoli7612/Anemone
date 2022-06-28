<?php
    use App\Models\Merce;
    Merce::create(['nominativo', 'stock'], [$_POST['nominativo'], $_POST['stock']]);
    header('Location: /dipendente/settings');