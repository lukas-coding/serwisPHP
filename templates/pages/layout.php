<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis Komputerowy</title>
    <script src="/public/main.js" defer></script>
    <link rel="stylesheet" href="/public/main.css">
</head>

<body>
    <header class="header">
        <h1 class="header__h1">Serwis Komputerowy</h1>
        <nav class="header__nav">
            <ul class="header__list">
                <li class="header__item"><a class="header__link" href="/">Strona Główna</a></li>
                <li class="header__item"><a class="header__link" href="/?action=new">Nowa naprawa</a></li>
                <li class="header__item"><a class="header__link" href="/?action=description">Opis</a></li>
                <li class="header__item"><a class="header__link" href="/?action=addClient">Dodaj klienta</a></li>
                <li class="header__item"><a class="header__link" href="/?action=find">Szukaj naprawy</a></li>
                <li class="header__item"><a class="header__link" href="/?action=create">Naprawy w trakcie</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <?php require_once("templates/pages/$page.php"); ?>
    </main>
</body>

</html>