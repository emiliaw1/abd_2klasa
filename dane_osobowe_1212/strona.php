<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "firma");
    $query = "SELECT * FROM pracownicy";
    $result = mysqli_query($connect, $query);
    echo "<table>
                <tr>
                    <td>id</td>
                    <td>imie</td>
                    <td>nazwisko</td>
                    <td>pesel</td>
                </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['imie'] . "</td>
                            <td>" . $row['nazwisko'] . "</td>
                            <td>" . $row['PESEL'] . "</td>
                        </tr>";
    };
    echo "</table>";

    if(isset())
    ?>
    <a href="pdf.php">
        <button>PDF</button>
    </a>
    <form action="post">
        Imie:<input type="text" name="imie" id="imie"><br>
        Nazwisko:<input type="text" name="imie" id="imie"><br>
        PESEL:<input type="text" name="imie" id="imie"><br>
        <input type="submit" value="Wyślij"><br>
    </form>
</body>

</html>
