<?php

use App\core\Auth;
use App\Models\Tema;

?>

<h1>Impostazioni</h1>

<form action="/db/reset" method="post">
    <input type="submit" value="Reset database">
</form>

<div class="w3-panel w3-theme w3-card-4 w3-round-large w3-padding w3-half w3-right">
    <label> Tema <br>
        <select id="id_tema" onchange="tema(this.value, this.options[this.selectedIndex].text)" class="w3-select w3-card w3-round-large w3-third">
            <?php foreach (Tema::all() as $tema) : ?>
                <option value="<?= $tema->id ?>"><?= $tema->colore ?></option>
            <?php endforeach ?>
        </select>
    </label>
    
    <script>
        var tema = function(id_tema, colore) {
            $('#theme_link').attr('href', 'https://www.w3schools.com/lib/w3-theme-' + colore + '.css')
            $.ajax({
                url: "account/tema",
                data: {
                    "id_tema": id_tema
                },
                method: "post"
            }).done(function() {
                $('#id_tema').val(<?= Auth::$utente->id_tema ?>);
            });
        }
    </script>
</div>