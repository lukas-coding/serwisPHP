<h2>dodaj klienta</h2>
<form action="/?action=addClient" method="POST">
    <fieldset>
        <legend>nowy klient</legend>
        <div class="wrapper">
            <label for="fname">Imię:</label>
            <input type="text" name="fname" id="fname">
            <label for="lname">Nazwisko:</label>
            <input type="text" name="lname" id="lfname">
            <label for="email">e-Mail:</label>
            <input type="e-mail" name="email" id="email">
            <label for="phone">Nr telefonu:</label>
            <input type="tel" name="phone" id="phone">
            <input type="submit" value="Zapisz" class="label_submit">
        </div>
    </fieldset>
</form>