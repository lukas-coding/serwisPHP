<h2>nowa naprawa</h2>
<form action="/?action=addClient&id" method="POST">
    <fieldset>
        <legend>Nowy sprzęt</legend>
        <div class="wrapper">
            <label for="brand">Nazwa:</label>
            <input type="text" name="brand" id="brand">
            <label for="type">Typ:</label>
            <select name="type" id="type">
                <option value="lap">Laptop</option>
                <option value="pc" selected>PC</option>
                <option value="tel">Telefon</option>
                <option value="tab">Tablet</option>
                <option value="print">Drukarka</option>
                <option value="mon">Monitor</option>
                <option value="def">Inny...</option>
            </select>
            <label for="permision">Zachować dane:</label>
            <select name="permision" id="permision">
                <option value="yes" selected>Tak</option>
                <option value="no">Nie</option>
            </select>
            <label for="serialnr">S/N:</label>
            <input type="text" name="serialnr" id="serialnr">
            <input type="submit" value="Dalej" class="label_submit">
        </div>
    </fieldset>
</form>