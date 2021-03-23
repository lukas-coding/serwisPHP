<h2 class="main__h2">nowa naprawa</h2>
<form class="form" action="/?action=new" method="POST" id="form">
    <fieldset class="form__fieldset">
        <legend class="form__legend">Nowy sprzęt</legend>
        <div class="form__wrapper">
            <label class="form__label" for="brand">Nazwa:</label>
            <input class="form__input" type="text" name="brand" id="brand" required>
            <label class="form__label" for="type">Typ:</label>
            <select class="form__select" name="type" id="type">
                <option class="form__option" value="Laptop">Laptop</option>
                <option class="form__option" value="PC" selected>PC</option>
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
            <input class="form__input" type="text" name="serialnr" id="serialnr">
            <input class="form__input form__input--submit" type="submit" value="Dalej" onclick="validateInput('brand')">
        </div>
    </fieldset>
</form>