<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis Komputerowy</title>
    <link rel="stylesheet" href="/./public/style.css">
</head>

<body>
    <header>
        <h1>Serwis Komputerowy</h1>
    </header>
    <section>
        <h2>nowa naprawa</h2>
        <form>
            <fieldset>
                <legend>Nowy sprzęt</legend>
                <div class="wrapper">
                    <label for="name">Nazwa:</label>
                    <input type="text" name="" id="name">
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
                    <label for="sn">S/N:</label>
                    <input type="text" name="sn" id="sn">
                    <label for="state">Stan: </label>
                    <input type="text" name="state" id="state">
                    <label for="procesor">Procesor: </label>
                    <input type="text" name="procesor" id="procesor">
                    <label for="memory">Ilość RAM: </label>
                    <input type="text" name="memory" id="memory">
                    <label for="battery">Bateria: </label>
                    <input type="text" name="battery" id="battery">
                    <label for="charger">Zasilacz: </label>
                    <input type="text" name="charger" id="charger">
                </div>
            </fieldset>
        </form>
    </section>
</body>

</html>