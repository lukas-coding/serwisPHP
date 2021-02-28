<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis Komputerowy</title>
    <link rel="stylesheet" href="/public/main.css">
</head>

<body>
    <header>
        <h1>Serwis Komputerowy</h1>
        <nav class="nav_area">
            <ul>
                <li><a href="/">Strona Główna</a></li>
                <li><a href="/?action=new">Nowa naprawa</a></li>
                <li><a href="/?action=addClient">Dodaj klienta</a></li>
                <li><a href="/?action=find">Szukaj naprawy</a></li>
                <li><a href="/?action=create">Naprawy w trakcie</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <?php require_once("templates/pages/$page.php"); ?>
    </section>
    <script src="/public/main.js"></script>
</body>

</html>