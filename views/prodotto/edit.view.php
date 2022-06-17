<?php

use App\Models\Prodotto;

use function App\core\partial;

 $prodotto = Prodotto::get($_GET['id']);
 
 include partial('edit/prodotto');

 ?>

