<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Arpajaisten voittajat</title>
    <link rel="stylesheet" href="tyyli.css">
</head>
<body>
    <h1>Arpajaisten voittajat</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $maara = intval($_POST["maara"]);

        if ($maara < 1) {
            echo "<p>Syötä vähintään yksi voittaja.</p>";
        } else {
            $tiedosto = "arvotut.txt";
            if (file_exists($tiedosto)) {
                $rivit = file($tiedosto, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                shuffle($rivit);
                $voittajat = array_slice($rivit, 0, $maara);

                echo "<h2>Voittajat</h2>";
                foreach ($voittajat as $voittaja) {
                    list($nimi, $sahkoposti, $puhelin, $arpa) = explode(";", $voittaja);
                    echo "<p><strong>$nimi</strong> — Arpanumero: $arpa</p>";
                }
            } else {
                echo "<p>Ei osallistujia vielä.</p>";
            }
        }
        echo "<br><form><input type='button' value='Palaa' onclick='history.back()'></form>";
    } else {
        echo '
        <form method="POST" action="">
            <label for="maara">Montako voittajaa arvotaan?</label><br>
            <input type="number" name="maara" id="maara" min="1" required><br><br>
            <input type="submit" value="Arvo voittajat">
        </form>
        ';
    }
    ?>
</body>
</html>
