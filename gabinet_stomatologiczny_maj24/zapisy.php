<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umów się na wizytę</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="zapisy">
    <header class="tytul">Gabinet stomatologiczny "Wróżka Zębuszka"</header>
        <nav class="menu">
            <ul>
                <li><a href="gabinet_stomatologiczny.html">Strona główna</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="uslugi.html">Cennik</a></li>
                <li><a href="zapisy.php">Umów się na wizytę</a></li>
                <li><a href="logowanie.php">Logowanie</a></li>
                <li><a href="wylogowanie.php">Wyloguj się</a></li>
            </ul>
        </nav>
        <div class="form_rej">
        <form action="" method="POST" class="form">
            <div><label for="text"> imie: </label><br><input type="text" name="imie"></div>
            <div><label for="text"> nazwisko: </label><br><input type="text" name="nazwisko"></div>
            <div><label for="date"> data </label><br><input type="date" name="data"></div>
            <div><label for="text"> godzina: </label><br><input type="time" name="godzina"></div>
            <div><label for="text"> telefon: </label><br><input type="number" name="telefon"></div>
            <div><label for="text"> email: </label><br><input type="text" name="email"></div>
            <div><label for="text"> usługa: </label><br><input type="text" name="usluga"></div>
            <div><label for="text"> karta stałego klienta:</label><br><input type="checkbox" name="karta"></div>
            <input type="reset" value="czyść">
            <input type="submit" value="umów się">
        </form>
    </div>
        
    <?php
        
        $c=mysqli_connect("localhost","root","","gabinet_stomatologiczny"); 
   
        if (isset($_POST['imie'])){
            $imie = $_POST['imie']  ;
        }
        if (isset($_POST['nazwisko'])){
            $nazwisko=$_POST['nazwisko'];
        }
        if (isset($_POST['data'])){
            $login=$_POST['data'];
        }
        if (isset($_POST['godzina'])){
            $haslo=$_POST['godzina'];
        }
        if (isset($_POST['telefon'])){
            $haslo=$_POST['telefon'];
        }
        if (isset($_POST['email'])){
            $email=$_POST['email'];
        }
        if (isset($_POST['usluga'])){
            $email=$_POST['usluga'];
        }


        $sprawdz = '/^[A-ZĄĆĘŃÓŚŹŻa-ząćęńóśźż]+$/';
        $sprawdz_email = '^[\w\.\-\+]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$^';

        if((!empty($imie)) || (!empty($nazwisko)) || (!empty($data)) || !(empty($godzina)) || (!empty($telefon)) || !(empty($email)) | !(empty($usluga))){

            if(preg_match($sprawdz,$_POST['imie'])){

                if(preg_match($sprawdz,$_POST['nazwisko'])){

                    if(preg_match($sprawdz_email,$_POST['email'])){

                        $imie = mb_strtolower($imie);
                        $nazwisko = mb_strtolower($nazwisko);
                        $imie = ucfirst($imie);
                        $nazwisko = ucfirst($nazwisko);
                        $query = "INSERT INTO `uzytkownicy` values ('','$imie','$nazwisko','$data','$godzina', '$telefon', '$email', '');";
                    
                        mysqli_query($c,$query);
                        mysqli_close($c);
                        $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
                        $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
                        header('Location: '.$url.'/zapisy.php');
                        exit();
                    }

                    else {
                        echo "Błędny email";
                        }
                }

                    else{
                        echo "Błędne nazwisko";
                    }
            }

            else{
                echo "Błędne imie";
            }
        } 

            else{
            echo "Prosze wypelnic wszystkie pola";
        }
    
    
                       
        
   
        ?>
</body>
</html>