<table class="table">
    <tr class="table__row">
        <th class="table__header">Imię</th>
        <th class="table__header">Nazwisko</th>
        <th class="table__header">Marka</th>
        <th class="table__header">Typ</th>
        <th class="table__header">Nr naprawy</th>
        <th class="table__header">Data przyjęcia</th>
        <th class="table__header">Opcje</th>
    </tr>
    <?php $year = date('Y');
    foreach ($viewParams['client'] ?? [] as $client) : ?>
        <tr class="table__row">
            <td class="table__data"><?= $client['fname'] ?></td>
            <td class="table__data"><?= $client['lname'] ?></td>
            <td class="table__data"><?= $client['brand'] ?></td>
            <td class="table__data"><?= $client['type'] ?></td>
            <td class="table__data"><?= $client['id'] . "/$year" ?></td>
            <td class="table__data"><?= $client['created'] ?></td>
            <td class="table__data table__data--green">
                <a class="table__link" href="/?action=show&id=<?php echo (int)$client['id']; ?>">Pokaż</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>