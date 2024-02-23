<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>


<body class="rejestracja">
    <h1>Rejestracja</h1>
    <div class="form_rej">
        <form action="" method="POST" class="form">
            <div><label for="text"> imie: </label><br><input type="text" name="imie"></div>
            <div><label for="text"> nazwisko: </label><br><input type="text" name="nazwisko"></div>
            <div><label for="text"> login: </label><br><input type="text" name="login"></div>
            <div><label for="text"> haslo: </label><br><input type="password" name="haslo"></div>
            <div><label for="text"> email: </label><br><input type="text" name="email"></div>
            <input type="reset" value="czysc">
            <input type="submit" value="zarejestruj">
        </form>
    </div>

        <p>Masz już konto?<a href="logowanie.php">Zaloguj się</a></p>
        
    <?php
        
        $c=mysqli_connect("localhost","root","","czat"); //identyfikator polaczenia, mysqli_connect laczy z serwerem i wyviera baze danych
    
   
        if (isset($_POST['imie'])){
            $imie = $_POST['imie']  ;
        }
        if (isset($_POST['nazwisko'])){
            $nazwisko=$_POST['nazwisko'];
        }
        if (isset($_POST['login'])){
            $login=$_POST['login'];
        }
        if (isset($_POST['haslo'])){
            $haslo=$_POST['haslo'];
        }
        if (isset($_POST['email'])){
            $email=$_POST['email'];
        }

        $sprawdz = '/^[A-ZĄĆĘŃÓŚŹŻa-ząćęńóśźż]+$/';
        $sprawdz_email = '^[\w\.\-\+]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$^';

        if((!empty($imie)) || (!empty($nazwisko)) || (!empty($login)) || !(empty($email)) || (!empty($haslo))){

            if(preg_match($sprawdz,$_POST['imie'])){

                if(preg_match($sprawdz,$_POST['nazwisko'])){

                    if(preg_match($sprawdz_email,$_POST['email'])){

                        $imie = mb_strtolower($imie);
                        $nazwisko = mb_strtolower($nazwisko);
                        $login = mb_strtolower($login);
                        $imie = ucfirst($imie);
                        $nazwisko = ucfirst($nazwisko);
                        $haslo = sha1($haslo);
                        $query = "INSERT INTO `uzytkownicy` values ('','$imie','$nazwisko','$login','$haslo','$email', '');";
                    
                        mysqli_query($c,$query);
                        mysqli_close($c);
                        $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
                        $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
                        header('Location: '.$url.'/logowanie.php');
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
