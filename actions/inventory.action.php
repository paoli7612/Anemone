<?php
    print_r($_POST);
use App\Models\Inventory;

    $tot = array();

    foreach ($_POST as $key => $value)
    {
        $id_merce = explode("_", $key)[0];
        $prod = explode("_", $key)[1];
        if ($prod != "quantita")
            $value = $prod*intval($value);
        if (array_key_exists($id_merce, $tot)) {
            $tot[$id_merce] += intval($value);
        } else {
            $tot[$id_merce] = intval($value);
        }
    }

    foreach ($tot as $id_merce => $qta)
    {
        if ($qta != 0)
            Inventory::create(['id_merce', 'qta'], [$id_merce, $qta]);
    }

?>