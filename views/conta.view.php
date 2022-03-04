<script>
    update = (tr) => {
        ins = tr.find('input');
        fin = ins.first();
        sin = ins.eq(1);
        let sum = fin.val() * fin.attr('stock');
        if (sin.val())
            sum += parseInt(sin.val());
        tr.find('span').html(sum);
    }
</script>   

<table class="w3-table-all">
    <?php foreach (array(
        ["Acqua naturale", 24, "ana"],
        ["Acqua frizzante", 24, "afr"],
        ["Cocacola plastica", 24, "cop"],
        ["Cocacola zero plastioca", 8, "cozp"],
        ["Cocacola vetro", 24, "cov"],
        ["Cocacola vetro zero", 24, "cozv"],
        ["Estathe pesca", 12, "esp"],
        ["Estathe limone", 12, "esl"],
        ["Fuze Tea limone", 12, "ftp"],
        ["Fuze Tea limone", 12, "ftl"]
    ) as $item) : ?>
        <tr id="<?= $item[2] ?>">
            <td><span>0</span></td>
            <th><?= $item[0] ?></th>
            <td class="h"><input stock="<?= $item[1] ?>" type="number" placeholder="x<?= $item[1] ?>" class="w3-input" onchange="update($(this).parent().parent())" onkeyup="update($(this).parent().parent())"></td>
            <td class="h"><input  type="number" placeholder="x1" class="w3-input" onchange="update($(this).parent().parent())" onkeyup="update($(this).parent().parent())"></td>
        </tr>
    <?php endforeach ?>
</table>

    