<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section>
        <h3>Ryby zamieszkujące rzeki</h3>
        <?php
        echo "<ol>";
        $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
        $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj=3";
        $wynik = mysqli_query($polaczenie, $sql);
        while ($wiersz = mysqli_fetch_assoc($wynik)) {
            echo "<li>" .$wiersz['nazwa'] . ", " . $wiersz['akwen'] . ", " . $wiersz['wojewodztwo'] . "</li>";
        }
        echo "</ol>";
        mysqli_close($polaczenie);
        ?>
    </section>

    <aside>
        <img src="ryba1.jpg" alt="Sum"><br>
        <a rel="stylesheet" href="kwerendy.txt">Pobierz kwerendy</a>
    </aside>

    <main>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
            $sql = "SELECT `id`,`nazwa`,`wystepowanie` FROM ryby WHERE styl_zycia=1";
            $wynik = mysqli_query($polaczenie, $sql);
            while ($wiersz = mysqli_fetch_assoc($wynik)) {
                echo "<tr><td>" . $wiersz['id'] . "</td><td>" . $wiersz['nazwa'] . "</td><td>" . $wiersz['wystepowanie'] . "</td></tr>";
            }
            ?>
        </table>
    </main>
    
    <footer>
        <p>Stronę wykonał: Denis Groń</p>
    </footer>
</body>
</html>