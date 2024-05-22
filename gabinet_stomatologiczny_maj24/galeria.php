<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
<?php
    $dir ="galeria/"; // image folder name
      if (is_dir($dir)){
         if ($dh = opendir($dir)){
                 while (($file = readdir($dh)) !== false){
                    if($file=="." OR $file==".."){} else { 
              ?>          
                         <img  style="width: 260px;" src="galeria/<?php echo $file; ?>"> 
             <?php
              }
             }
         closedir($dh);
         }
    } 
?>
</body>
</html>