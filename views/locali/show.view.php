<?php

use App\core\Request;
use App\Models\Locale;

    $locale = Locale::getBy('slug', Request::uri(1))

?>


<?php print_r($locale) ?>

