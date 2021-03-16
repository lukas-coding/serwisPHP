<h2 class="main__h2">Edycja</h2>
<?php $customer = $viewParams['customer'] ?? [];
$year = date('Y'); ?>

<form class="form" action="/?action=editSave&id=<?= $customer['id'] ?>" method="POST">
    <fieldset class="form__fieldset">

        <legend class="form__legend">Edycja parametrów</legend>
        <section class="edit">
            <div class="edit__wrapper">
                <label class="form__label" for="fname">Imię:</label>
                <input class="form__input" type="text" name="fname" id="fname" value="<?= $customer['fname'] ?>">
                <label class="form__label" for="lname">Nazwisko:</label>
                <input class="form__input" type="text" name="lname" id="lname" value="<?= $customer['lname'] ?>" required>
                <label class="form__label" for="email">e-Mail:</label>
                <input class="form__input" type="e-mail" name="email" id="email" value="<?= $customer['email'] ?>">
                <label class="form__label" for="phone">Nr telefonu:</label>
                <input class="form__input" type="tel" name="phone" id="phone" value="<?= $customer['phonenr'] ?>">
            </div>
            <div class="edit__wrapper">
                <label class="form__label" for="brand">Nazwa:</label>
                <input class="form__input" type="text" name="brand" id="brand" value="<?= $customer['brand'] ?>" required>
                <label class="form__label" for="type">Typ:</label>
                <select class="form__select" name="type" id="type">
                    <option class="form__option" value="Laptop">Laptop</option>
                    <option class="form__option" value="PC">PC</option>
                    <option class="form__option" value="Telefon">Telefon</option>
                    <option class="form__option" value="Tablet">Tablet</option>
                    <option class="form__option" value="Drukarka">Drukarka</option>
                    <option class="form__option" value="Monitor">Monitor</option>
                    <option class="form__option" value="Inny">Inny...</option>
                </select>
                <label class="form__label" for="datasave">Zachować dane:</label>
                <select class="form__select" name="datasave" id="permision">
                    <option class="form__option" value="Tak" selected>Tak</option>
                    <option class="form__option" value="Nie">Nie</option>
                    <option class="form__option" value="Nie dotyczy">Nie dotyczy</option>
                </select>
                <label class="form__label" for="serialnr">S/N:</label>
                <input class="form__input" type="text" name="serialnr" id="serialnr" value="<?= $customer['serialnr'] ?>">
            </div>
            <div class="edit__wrapper-description">
                <textarea class="form__textarea" name="description" cols="1" rows="10"><?= $customer['description'] ?></textarea>
                <label class="form__label" for="cost">Koszt naprawy:</label>
                <input class="form__input" type="text" name="cost" id="price" value="<?= $customer['cost'] ?>">
            </div>
            <input class="form__input form__input--submit" type="submit" value="Zapisz" onclick="checkInputBrand()">
        </section>
    </fieldset>
</form>