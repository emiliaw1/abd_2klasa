<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Czat</title>
</head>
<body class="czat">
    <?php
    include 'menu.php';
    session_start();
    $connect=mysqli_connect("localhost","root","","czat");

    if(empty($_SESSION['id'])) {
        $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
        $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
        header('Location: '.$url.'/logowanie.php');
    }
    $id = $_SESSION['id'];
    if (isset($_POST['tekst'])) {
        $tekst = $_POST['tekst'];
        $query="INSERT INTO wiadomosci values('', '$tekst', '$id', now());";
        mysqli_query($connect,$query);       
    }

    $query="SELECT * from `wiadomosci`,`uzytkownicy` where uzytkownicy.id = wiadomosci.id_uzytkownika order by wiadomosci.data;";
    $result=mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($result)) {      
        echo '<div class="'.($row['id']==$id ? 'moja_wiadomosc' : 'wiadomosc').'">';
        echo $row["data"].'<br/>';
        echo (!empty($row['profilowe']) ? '<img src="/profilowe/'.$row["id"].'/'.$row["profilowe"].'" width="30px"/>' : '').'<b>'.$row["login"].'</b><br/>';
        echo $row["tekst"].'<br/>';
        echo "</div>";
    }

    
    ?>
    <form action="" method="post">
        <div><label for="tekst"><textarea name="tekst" id="tekst" cols="30" rows="10"></textarea></label></div>
        <input type="submit" value="dodaj">
    </form>
    <?php
         
    mysqli_close($connect);
    ?>
</body>
</html>
