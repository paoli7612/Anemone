<pre class="w3-black">

    <?php
    use App\Models\Prodotto;
    print_r($_POST);
    $prodotto = Prodotto::get($_POST['id']);

    $prodotto->update([
        'nominativo' => $_POST['nominativo'],
        'colore' => $_POST['colore'],
        'id_categoria' => $_POST['id_categoria']
    ]);

    header('Location: ' . $prodotto->path('edit'));
    ?>
</pre>