<!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Port Lotniczy</title>
        <link rel="stylesheet" href="styl5.css">
    </head>
    <body>
        <header id="baner">
            <div class="baner__pierwszy">
                <p>OBRAZ</p>
            </div>
            <div class="baner__drugi">
                <h1>Przyloty</h1>
            </div>
            <div class="baner__trzeci">
                <h1>Przydatne linki</h1>
                <a href="kwerendy.txt" target="_blank">Pobierz...</a>
            </div>
        </header>
        <section id="main">
            <table>
                <tr>
                    <th>czas</th>
                    <th>kierunek</th>
                    <th>numer rejsu</th>
                    <th>status</th>
                </tr>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'egzamin1');

                    $query = mysqli_query($conn, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC");
                    while($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                        echo "</tr>";
                    }

                    mysqli_close($conn);
                ?>
            </table>
        </section>
        <footer id="stopka">
            <div class="stopka__lewy">
                <?php
                    if(!isset($_COOKIE["cookie"])) {
                        echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
                        setcookie("cookie", "1", (time() + (60 * 120)), "/");
                    } else {
                        echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                    }
                ?>
            </div>
            <div class="stopka__prawy">
                Autor: PESEL
            </div>
        </footer>
    </body>
</html>