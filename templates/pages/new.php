<h2>nowa naprawa</h2>
<form action="/?action=create" method="POST">
    <fieldset>
        <legend>Nowy sprzęt</legend>
        <div class="wrapper">
            <label for="brand">Nazwa:</label>
            <input type="text" name="brand" id="brand">
            <label for="type">Typ:</label>
            <select name="type" id="type">
                <option value="Laptop">Laptop</option>
                <option value="PC" selected>PC</option>
                <option value="Telefon">Telefon</option>
                <option value="Tablet">Tablet</option>
                <option value="Drukarka">Drukarka</option>
                <option value="Monitor">Monitor</option>
                <option value="Inny">Inny...</option>
            </select>
            <label for="permision">Zachować dane:</label>
            <select name="permision" id="permision">
                <option value="Tak" selected>Tak</option>
                <option value="Nie">Nie</option>
            </select>
            <label for="serialnr">S/N:</label>
            <input type="text" name="serialnr" id="serialnr">
            <input type="submit" value="Dalej" class="label_submit">
        </div>
    </fieldset>
</form>