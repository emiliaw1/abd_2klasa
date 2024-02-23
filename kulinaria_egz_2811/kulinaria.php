<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja kulinarna.pl</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="header">
        <h2>Restauracja kulinarna.pl Zaprasza!</h2>
    </header>

    <div class=sekcje>

    <section class="panel_lewy">
        <p>Dania mięsne zamówisz już od [skrypt 1] złotych</p>
        <img src="menu.jpg" alt="Pyszne spaghetti"><br/>
        <a href="menu.jpg">Pobierz obraz</a>
    </section>

    <section class="panel_srodkowy">
        <h3>Przekąski</h3>
        (skrypt 2)
    </section>

    <section class="panel_prawy">
        <h3>Napoje</h3>
        (skrypt 3)
    </section>

    </div>

    <footer class="stopka">
        <p>Stronę internetową opracowała <div class="kursywa">Emilia Wierzbanowska</div></p>
    </footer>

    <?php
        $connect = mysqli_connect("localhost", "root", "", "baza")

        mysqli_close();
    ?>
</body>
</html>
