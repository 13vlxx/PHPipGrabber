<?php
require("./config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //* $_SERVER["REMOTE_ADDR"];
    $ip = ip;
    $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
    $continent = $data["geoplugin_continentName"];
    $country = $data["geoplugin_countryName"];
    $departement = $data["geoplugin_region"];
    $city = $data["geoplugin_city"];
    $region = $data["geoplugin_regionName"];
    $latitude = $data["geoplugin_latitude"];
    $longitude = $data["geoplugin_longitude"];
    ?>
</body>

</html>

<?php
try {
    // Création d'une instance PDO
    $pdo = new PDO(dsn, username, password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));

    // Requête d'insertion avec des paramètres
    $sql = "INSERT INTO `data`(`adresseIP`, `continent`, `pays`, `departement`, `ville`, `region`, `latitude`, `longitude`) VALUES (:ip, :continent, :pays, :departement, :ville, :region, :latitude, :longitude)";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs aux paramètres
    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':continent', $continent);
    $stmt->bindParam(':pays', $country);
    $stmt->bindParam(':departement', $departement);
    $stmt->bindParam(':ville', $city);
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':latitude', $latitude);
    $stmt->bindParam(':longitude', $longitude);

    // Exécution de la requête
    $stmt->execute();

    echo "Données insérées avec succès.";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>