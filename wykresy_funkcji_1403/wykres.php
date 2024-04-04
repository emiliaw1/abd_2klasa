<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wykresy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="rysunek.php" method="post">
        <label for="a">Podaj a:</label>
        <input type="number" name="a"> <br>
        <label for="b">Podaj b:</label>
        <input type="number" name="b"> <br>
        <label for="c">Podaj c:</label>
        <input type="number" name="c"> <br>
        <label for="poczatek">Podaj zakres:</label>
        <input type="number" name="poczatek">
        <input type="number" name="koniec"> <br>
        <input type="submit" value="Rysuj" name="rysuj">
    </form>
    <?php
        echo '<img src="wykr.png" alt="tu ma być układ"/>';
        session_start();
        $a = $_SESSION['a'];
        $b = $_SESSION['b'];
        $c = $_SESSION['c'];
        if($a == 0){
            echo "<br>";
            if($c > 0){
                echo "Wzór: ".$b."x + ".$c;
            }
            else if($c == 0){
                echo "Wzór: ".$b."x";
            }
            else{
                echo "Wzór: ".$b."x - ".abs($c);
            }
        }
        else{
            echo "<br>";
            if($c > 0){
                if($b > 0)
                echo "Wzór: ".$a."x<sup>2</sup>".$b."x + ".$c;
            }
            else if($c == 0){
                echo "Wzór: ".$b."x";
            }
            else{
                echo "Wzór: ".$b."x - ".abs($c);
            }
        }
    ?>
</body>
</html>
