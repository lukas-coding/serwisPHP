<h2 class="main__h2">dodaj klienta</h2>
<form class="form" action="/?action=addClient" method="POST">
    <fieldset class="form__fieldset">
        <legend class="form__legend">nowy klient</legend>
        <div class="form__wrapper">
            <label class="form__label" for="fname">Imię:</label>
            <input class="form__input" type="text" name="fname" id="fname">
            <label class="form__label" for="lname">Nazwisko:</label>
            <input class="form__input" type="text" name="lname" id="lname" required>
            <label class="form__label" for="email">e-Mail:</label>
            <input class="form__input" type="e-mail" name="email" id="email" required>
            <label class="form__label" for="phone">Nr telefonu:</label>
            <input class="form__input" type="tel" name="phone" id="phone">
            <input class="form__input form__input--submit" type="submit" value="Zapisz" class="label_submit" onclick="validateInput('lname')">
        </div>
    </fieldset>
</form>