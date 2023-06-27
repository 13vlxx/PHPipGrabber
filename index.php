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
    <form action="" method="POST">
        <input name="nom" type="text" placeholder="Enter your name">
        <input name="submit" type="submit" value="fetch">
    </form>
    <?php
    //* $_SERVER["REMOTE_ADDR"];
    ?>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $ip = ip;
    $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
    $continent = $data["geoplugin_continentName"];
    $country = $data["geoplugin_countryName"];
    $departement = $data["geoplugin_region"];
    $city = $data["geoplugin_city"];
    $region = $data["geoplugin_regionName"];
    $latitude = $data["geoplugin_latitude"];
    $longitude = $data["geoplugin_longitude"];

    try {
        // Création d'une instance PDO
        $pdo = new PDO(dsn, username, password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête d'insertion avec des paramètres
        $sql = "INSERT INTO `data`(`nom`, `adresseIP`, `continent`, `pays`, `departement`, `ville`, `region`, `latitude`, `longitude`)
        VALUES ( :nom, :ip, :continent, :pays, :departement, :ville, :region, :latitude, :longitude)";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':nom', $nom);
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
}
?>