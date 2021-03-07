<table class="table">
    <tr class="table__row">
        <th class="table__header">Imię</th>
        <th class="table__header">Nazwisko</th>
        <th class="table__header">e-mail</th>
        <th class="table__header">nr telefonu</th>
        <th class="table__header">Marka</th>
        <th class="table__header">Typ</th>
        <th class="table__header">Zgoda na utratę danych</th>
        <th class="table__header">Koszt naprawy</th>
        <th class="table__header">Nr seryjny</th>
        <th class="table__header">Nr naprawy</th>
        <th class="table__header">Data przyjęcia</th>
    </tr>
    <?php $customer = $viewParams['customer'] ?? [];
    $year = date('Y'); ?>
    <?php if ($customer) : ?>
        <tr class="table__row">
            <td class="table__data"><?= $customer['fname'] ?></td>
            <td class="table__data"><?= $customer['lname'] ?></td>
            <td class="table__data"><?= $customer['email'] ?></td>
            <td class="table__data"><?= $customer['phonenr'] ?></td>
            <td class="table__data"><?= $customer['brand'] ?></td>
            <td class="table__data"><?= $customer['type'] ?></td>
            <td class="table__data"><?= $customer['datasave'] ?></td>
            <td class="table__data"><?= $customer['cost'] ?></td>
            <td class="table__data"><?= $customer['serialnr'] ?></td>
            <td class="table__data"><?= $customer['id'] . "/$year" ?></td>
            <td class="table__data"><?= $customer['created'] ?></td>
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
    <a href="/?action=edit&id=<?= $customer['id'] ?>" class="description__link">
        <button class="description__btn">Edytuj</button>
    </a>
    <a href="#" class="description__link">
        <button class="description__btn description__btn--red">Usuń</button>
    </a>
</section>