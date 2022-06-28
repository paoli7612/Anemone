<?php

use App\core\Request;
use App\Models\Area;

    $area = Area::getBy('slug', Request::uri(1))

?>


<?php print_r($area) ?>

