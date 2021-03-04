<table style="width:100%">
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>e-mail</th>
        <th>nr telefonu</th>
        <th>Marka</th>
        <th>Typ</th>
        <th>Zgoda na utratę danych</th>
        <th>Koszt naprawy</th>
        <th>Nr seryjny</th>
        <th>Nr naprawy</th>
        <th>Data przyjęcia</th>
        <th>Opcje</th>
    </tr>
    <?php $year = date('Y');
    foreach ($viewParams['client'] ?? [] as $client) : ?>
        <tr>
            <td><?= $client['fname'] ?></td>
            <td><?= $client['lname'] ?></td>
            <td><?= $client['email'] ?></td>
            <td><?= $client['phonenr'] ?></td>
            <td><?= $client['brand'] ?></td>
            <td><?= $client['type'] ?></td>
            <td><?= $client['datasave'] ?></td>
            <td><?= $client['cost'] ?></td>
            <td><?= $client['serialnr'] ?></td>
            <td><?= $client['id'] . "/$year" ?></td>
            <td><?= $client['created'] ?></td>
            <td class="tdShow">
                <a href="/?action=show&id=<?php echo (int)$client['id']; ?>" class="aShow">Pokaż</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>