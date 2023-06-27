<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datas</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    if (isset($_SESSION["ip"]) && isset($_SESSION["continent"]) && isset($_SESSION["country"]) && isset($_SESSION["departement"]) && isset($_SESSION["city"]) && isset($_SESSION["region"]) && isset($_SESSION["latitude"]) && isset($_SESSION["longitude"])) {
        $ip = $_SESSION["ip"];
        $continent = $_SESSION["continent"];
        $country = $_SESSION["country"];
        $departement = $_SESSION["departement"];
        $city = $_SESSION["city"];
        $region = $_SESSION["region"];
        $latitude = $_SESSION["latitude"];
        $longitude = $_SESSION["longitude"];

        // Affichage du tableau
        echo '<table>';
        echo '<tr><th>IP</th><th>Continent</th><th>Country</th><th>Departement</th><th>City</th><th>Region</th><th>Latitude</th><th>Longitude</th></tr>';
        echo '<tr><td>' . $ip . '</td><td>' . $continent . '</td><td>' . $country . '</td><td>' . $departement . '</td><td>' . $city . '</td><td>' . $region . '</td><td>' . $latitude . '</td><td>' . $longitude . '</td></tr>';
        echo '</table>';
    } else {
        echo "Aucune donnée de session n'est disponible.";
    }
    ?>
</body>

</html>