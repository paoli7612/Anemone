<?php

use App\core\Router;
use App\Models\Fascia;

 Fascia::delete($_POST['id_fascia']);
 Router::redirect('/fascia') ?>