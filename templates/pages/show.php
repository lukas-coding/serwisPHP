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
    </tr>
    <?php $customer = $viewParams['customer'];

    $year = date('Y'); ?>
    <tr>
        <td><?= $customer['fname'] ?></td>
        <td><?= $customer['lname'] ?></td>
        <td><?= $customer['email'] ?></td>
        <td><?= $customer['phonenr'] ?></td>
        <td><?= $customer['brand'] ?></td>
        <td><?= $customer['type'] ?></td>
        <td><?= $customer['datasave'] ?></td>
        <td><?= $customer['cost'] ?></td>
        <td><?= $customer['serialnr'] ?></td>
        <td><?= $customer['id'] . "/$year" ?></td>
        <td><?= $customer['created'] ?></td>
    </tr>
</table>
<div class="showDiv">
    <h2>Opis uszkodzenia:</h2>
    <div class="showDescription">
        <p><?= $customer['description'] ?></p>
    </div>
</div>