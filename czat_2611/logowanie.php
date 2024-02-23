<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
    <script>
                function myFunction() {
                var x = document.getElementById("haslo");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
} 
    </script>
</head>

<body class="logowanie">
    <h1>Logowanie</h1>
    <div class="form_log">
        <form action="" method="post" class="form" name="logowanie">
        <label for="login">login: <br><input type="text" name="login" id="login"><br/></label>
        <label for="haslo">haslo: <br><input type="password" name="haslo" id="haslo"><br/></label>
        <label for="zaloguj"><input type="submit" value="zaloguj"></label>
        </form>
    </div>

        <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj się</a></p>
    <?php
        //error_reporting(255);
        session_start();
       
        if(!empty($_POST['login']) && !empty($_POST['haslo'])){
 
            if (isset($_POST['login'])){
                $login = $_POST['login'];
            }


            if (isset($_POST['haslo'])){
                $haslo = $_POST['haslo'];
            }

            $connect = mysqli_connect("localhost","root","","czat");
        
            if (isset($_POST['login'])){
                $haslo = sha1($_POST['haslo']);
            }

            $query = "SELECT * FROM uzytkownicy where login='$login' && haslo='$haslo'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($result);

            if (!empty($row['login'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                mysqli_close($connect);
                $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
                $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
                header('Location: '.$url.'/czat.php');
            }

            else {
                echo("Nieprawidłowy login lub hasło");
            }
        
            mysqli_close($connect);
            
    } else {
        echo "Wszystkie pola muszą zostać wypełnione";
 }
    ?>
     
</body>
</html>
