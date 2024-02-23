<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'menu.php';
    ?>
    <div class="pliki" >
        <form method="POST" ENCTYPE="multipart/form-data" name="pliki" action="">
            <input type="file" name="plik"/><br/>
            <input type="submit" value="Wyslij plik"/>
        </form>
    </div>
 <?php
    session_start();
    if (!isset($_SESSION['id'])) {
        $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
        $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
        header('Location: '.$url.'/logowanie.php');
        exit();
    }
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $folder = $document_root.'/profilowe/'.$_SESSION['id'];
    $c = mysqli_connect("localhost","root","","czat");
    if (isset($_FILES['plik'])) {
        $dozwolone_rozszerzenia = array("jpeg","jpg","tiff","tif","png", "gif");
        $plik_rozszerzenie = pathinfo(strtolower($_FILES['plik']['name']), PATHINFO_EXTENSION);
        if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true)) {
            echo("Niedozwolone rozszerzenie pliku.");
        }
        else {
            $tmp_lokacja = $_FILES['plik']['tmp_name'];
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $nazwa = $_FILES['plik']['name'];
            move_uploaded_file($tmp_lokacja, $folder.'\\'.$nazwa);
            $query = "UPDATE uzytkownicy set profilowe='$nazwa' where id='$_SESSION[id]';";
            mysqli_query($c,$query);
        }      
    }
    $query = "SELECT * FROM `uzytkownicy` where `id`='$_SESSION[id]';";
    $result = mysqli_query($c,$query);
    $row = mysqli_fetch_array($result);
    if (!empty($row['profilowe'])) {
        echo '<div class="pliki"> Bieżące profilowe: <br/> <img src="'.'/profilowe/'.$_SESSION['id'].'/'.$row['profilowe'].'" width="50px"/><br/> </div>';
    }   
    mysqli_close($c);

    //CO MUSI BYC NA SZÓSTECZKE: SESJE MUSZA BYC ZROBIONE, zrobic admina i sesje ktora sprawdza czy jest admin czy nie, rejestracja i logowanie, wylogowywanie!!, wyloguj przekierowuje do logowania, niszczenie sesji, te zdj ktore maja byc przyesylane to profilowe ludzi i z tego ma byc czat taki mesendzer i zrobic style ale wezme se jakis z neta na logowanie, zrobic pregmacze
 ?>
 
</body>
</html>
