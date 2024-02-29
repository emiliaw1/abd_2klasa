<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="captcha.php" alt="">
    <form method="post">
        <input type="text" name="tekst" id="tekst">
        <input type="submit" value="Wyślij">
    </form>
    <?php
        session_start();
        $tekst = $_POST['tekst'];
        if(!empty($tekst)){
            if($_SESSION['check']!=$tekst){
                echo "Źle";
            }
            else{
                echo "Dobrze";
            }
        
        }
    ?>
</body>
</html>
