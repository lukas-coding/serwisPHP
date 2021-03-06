<table style="width:100%">
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Marka</th>
        <th>Typ</th>
        <th>Nr naprawy</th>
        <th>Data przyjęcia</th>
        <th>Opcje</th>
    </tr>
    <?php $year = date('Y');
    foreach ($viewParams['client'] ?? [] as $client) : ?>
        <tr>
            <td><?= $client['fname'] ?></td>
            <td><?= $client['lname'] ?></td>
            <td><?= $client['brand'] ?></td>
            <td><?= $client['type'] ?></td>
            <td><?= $client['id'] . "/$year" ?></td>
            <td><?= $client['created'] ?></td>
            <td class="tdShow">
                <a href="/?action=show&id=<?php echo (int)$client['id']; ?>" class="aShow">Pokaż</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>