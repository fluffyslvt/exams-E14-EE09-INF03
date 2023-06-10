<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styl_1.css">
        <title>Wędkowanie</title>
    </head>
    <body>
        <section id="baner">
            <h1>Portal dla wędkarzy</h1>
        </section>
        <section id="main">
            <div class="lewy">
                <div class="lewy__top">
                    <h3>Ryby zamieszkujące rzeki</h3>
                    <ol>
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

                            $query1 = mysqli_query($conn, "SELECT r.nazwa, l.akwen, l.wojewodztwo FROM Ryby r INNER JOIN lowisko l ON l.Ryby_id = r.id WHERE rodzaj = '3'");
                            while($row = mysqli_fetch_array($query1)) {
                                echo "<li>".$row[0]." pływa w rzece ".$row[1].", ".$row[2]."</li>";
                            };
                        ?>
                    </ol>
                </div>
                <div class="lewy__bottom">
                    <h3>Ryby drapieżne naszych wód</h3>
                    <table>
                        <tr>
                            <th>L.p.</th>
                            <th>Gatunek</th>
                            <th>Występowanie</th>
                        </tr>
                        <?php
                            $query2 = mysqli_query($conn, "SELECT id, nazwa, wystepowanie FROM Ryby WHERE styl_zycia = '1'");
                            while($row = mysqli_fetch_array($query2)) {
                                echo "<tr>";
                                    echo "<td>".$row[0]."</td>";
                                    echo "<td>".$row[1]."</td>";
                                    echo "<td>".$row[2]."</td>";
                                echo "<tr>";
                            }

                            mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
            <div class="prawy">
                <img src="ryba1.jpg" alt="Sum"> <br>
                <a href="kwerendy.txt">Pobierz kwerendy</a>
            </div>
        </section>
        <footer id="stopka">
            <p>Stronę wykonał: NUMER ARKUSZA</p>
        </footer>
    </body> 
</html>