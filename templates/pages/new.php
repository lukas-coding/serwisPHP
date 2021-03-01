<h2>nowa naprawa</h2>
<form action="/?action=new" method="POST" id="form">
    <fieldset>
        <legend>Nowy sprzęt</legend>
        <div class="wrapper">
            <label for="brand">Nazwa:</label>
            <input type="text" name="brand" id="brand" required>
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
            <label for="datasave">Zachować dane:</label>
            <select name="datasave" id="permision">
                <option value="Tak" selected>Tak</option>
                <option value="Nie">Nie</option>
            </select>
            <label for="serialnr">S/N:</label>
            <input type="text" name="serialnr" id="serialnr">
            <input type="submit" value="Zapisz" class="label_submit" onclick="checkInputBrand()">
        </div>
    </fieldset>
</form>