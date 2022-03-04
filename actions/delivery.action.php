<?php

    use App\Models\Delivery;
    foreach (array('Deliveroo', 'Glovo', 'JustEat', 'UberEats') as $name) {
        foreach (array('App', 'Contante') as $pagamento) {
            foreach ($_POST[$name.$pagamento] as $d) {
                echo $d . "<br>";
                if ($d) 
                    Delivery::create($name.$pagamento, $d);
            }
        }
    }
    header('Location: /archive');
?>
