<?php $customer = $viewParams['customer'] ?? [];
$year = date('Y');

$q = "SELECT avg(slary) FROM employee;"

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/print.css">
</head>

<body> <?php if ($customer) : ?>
        <header class="header">
            <h1 class="header__h1">Naprawa nr <?= $customer['id'] . "/$year" ?></h1>
            <p class="header__text">Dowód przyjęcia sprzętu do naprawy</p>
        </header>
        <main class="main">
            <section class="main__content">
                <h2 class="main__h2">Właściciel</h2>
                <p class="main__txt">Imię i nazwisko: <?= $customer['fname'] . " " . $customer['lname'] ?> </p>
                <p class="main__txt">Telefon: <?= $customer['phonenr'] ?></p>
                <p class="main__txt">e-Mail: <?= $customer['email'] ?> </p>
            </section>
            <section class="main__content">
                <h2 class="main__h2">Sprzęt</h2>
                <p class="main__txt">Nazwa sprzętu: <?= $customer['brand'] ?> </p>
                <p class="main__txt">Zgoda na utratę danych: <?= $customer['datasave'] ?> </p>
                <p class="main__txt">nr seryjny: <?= $customer['serialnr'] ?> </p>
            </section>
        <?php endif; ?>
        </main>
</body>

</html>