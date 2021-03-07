<h2 class="main__h2">opis usterki</h2>
<form class="form" action="?action=description" method="POST">
    <fieldset class="form__fieldset">
        <legend class="form__legend">opis</legend>
        <div class="form__wrapper">
            <textarea class="form__textarea" name="description" cols="1" rows="10"></textarea>
            <label class="form__label" for="cost">Koszt naprawy:</label>
            <input class="form__input" type="text" name="cost" id="price">
            <input class="form__input form__input--submit" type="submit" value="Dalej" class="label_submit">
        </div>
    </fieldset>
</form>