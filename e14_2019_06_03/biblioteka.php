<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteka miejska</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header id="baner">
            <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
        </header>
        <section id="main">
            <div class="main__1">
                <h3>W naszych zbiorach znajdziesz dzieła następujących autorów</h3>
                <ul>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'biblioteka');

                        $query1 = mysqli_query($conn, "SELECT imie, nazwisko FROM autorzy");
                        while($row = mysqli_fetch_array($query1)) {
                            echo "<li>";
                                echo $row[0]." ".$row[1];
                            echo "</li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="main__2">
                <h3>Dodaj nowego czytelnika</h3>
                <form action="#" method="POST">
                    <label for="imie">imię:</label>
                    <input type="text" name="imie"> <br>

                    <label for="nazwisko">nazwisko:</label>
                    <input type="text" name="nazwisko"> <br>

                    <label for="rok-urodzenia">rok urodzenia:</label>
                    <input type="number" name="rok-urodzenia"> <br>

                    <input type="submit" value="DODAJ">
                </form>
                <?php
                    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['rok-urodzenia'])) {
                        $name = $_POST['imie'];
                        $surname = $_POST['nazwisko'];
                        $birthYear = $_POST['rok-urodzenia'];

                        $strCode = strtoupper(substr($name, 0, 2).substr($surname, 0, 2));
                        $userCode = $strCode.$birthYear[-2].$birthYear[-1];

                        $query2 = "INSERT INTO czytelnicy VALUES (NULL, '$name', '$surname', '$userCode')";
                        mysqli_query($conn, $query2);

                        echo "<p>Czytelnik: $name $surname został dodany do bazy danych</p>";
                    }

                    mysqli_close($conn);
                ?>
            </div>
            <div class="main__3">
                <img src="biblioteka.png" alt="książki">
                <h4>
                    ul. Czytelnicza 25 <br> 
                    12-120 Książkowice <br> 
                    tel.:123123123 <br> 
                    e-mail: <a href="biuro@biblioteka.pl">biuro@biblioteka.pl</a>
                </h4>
            </div>
        </section>
        <footer id="stopka">
            <p>Projekt strony: PESEL</p>
        </footer>
    </body>
</html>