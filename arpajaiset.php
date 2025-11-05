<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Arpajaisiin osallistuminen</title>
    <link rel="stylesheet" href="tyyli.css">
</head>
<body>
    <h1>Arpajaisiin osallistuminen</h1>

    <?php
    // Funktio sähköpostin tarkistamiseen
    function tarkistaSahkoposti($email) {
        return strpos($email, "@") !== false;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nimi = htmlspecialchars($_POST["nimi"]);
        $sahkoposti = htmlspecialchars($_POST["sahkoposti"]);
        $puhelin = htmlspecialchars($_POST["puhelin"]);

        // Tarkista sähköposti
        if (!tarkistaSahkoposti($sahkoposti)) {
            echo "<p style='color:red;'>Virheellinen sähköpostiosoite!</p>";
        } else {
            // Arvotaan arpanumero 1–10000
            $arpanumero = rand(1, 10000);

            // Tulostetaan tiedot
            echo "<h2>Arvontatiedot</h2>";
            echo "<p><strong>Nimi:</strong> $nimi</p>";
            echo "<p><strong>Sähköposti:</strong> $sahkoposti</p>";
            echo "<p><strong>Puhelinnumero:</strong> $puhelin</p>";
            echo "<p><strong>Arpanumero:</strong> $arpanumero</p>";

            // Tallennetaan tiedot tiedostoon
            $rivi = "$nimi;$sahkoposti;$puhelin;$arpanumero\n";
            file_put_contents("arvotut.txt", $rivi, FILE_APPEND);

            echo "<br><form><input type='button' value='Palaa' onclick='history.back()'></form>";
        }
    } else {
        // Näytetään lomake
        echo '
        <form method="POST" action="">
            <label for="nimi">Nimi:</label><br>
            <input type="text" name="nimi" id="nimi" required><br><br>

            <label for="sahkoposti">Sähköposti:</label><br>
            <input type="email" name="sahkoposti" id="sahkoposti" required><br><br>

            <label for="puhelin">Puhelinnumero:</label><br>
            <input type="text" name="puhelin" id="puhelin" required><br><br>

            <input type="submit" value="Osallistu arvontaan">
        </form>
        ';
    }
    ?>
</body>
</html>
