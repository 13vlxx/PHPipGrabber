<?php
require("./config/config.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Tracker</title>
</head>

<body>
    <form action="fetchdata.php" method="POST">
        <input name="nom" type="text" placeholder="Enter your name">
        <input name="submit" type="submit" value="fetch">
    </form>
</body>

</html>