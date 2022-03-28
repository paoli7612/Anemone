<?php 
    $tot = array();

    foreach ($_POST as $key => $value)
    {
        $id = explode("_", $key)[0];
        $prod = explode("_", $key)[1];
        if ($prod != "quantita")
            $value = $prod*intval($value);
        if (array_key_exists($id, $tot)) {
            $tot[$id] += intval($value);
        } else {
            $tot[$id] = intval($value);
        }
    
    }

    print_r($tot);

?>