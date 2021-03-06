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
    <?php $customer = $viewParams['customer'] ?? [];
    $year = date('Y'); ?>
    <?php if ($customer) : ?>
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
    <?php endif; ?>
</table>
<section class="description">
    <div class="description__wrapper">
        <h2 class="descritpion__header">Opis uszkodzenia:</h2>
        <div class="description__show">
            <p class="description__text"><?= $customer['description'] ?></p>
        </div>
    </div>
    <a href="?action=create" class="description__link">
        <button class="description__btn">Powrót do Listy</button>
    </a>
    <a href="#" class="description__link">
        <button class="description__btn">Drukuj</button>
    </a>
    <a href="#" class="description__link">
        <button class="description__btn">Edytuj</button>
    </a>
    <a href="#" class="description__link">
        <button class="description__btn description__btn--red">Usuń</button>
    </a>
</section>