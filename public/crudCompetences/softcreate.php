<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$namesoft = [];
$itemsoft = [];
$valuesoft = [] ;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $namesoft = trim($_POST['namesoft']);
    $itemsoft = trim($_POST['itemsoft']);
    $valuesoft = trim($_POST['valuesoft']);
    $query = "INSERT INTO softSkill (namesoft , itemsoft, valuesoft) VALUES ( :namesoft, :itemsoft, :valuesoft )";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':namesoft', $namesoft, PDO::PARAM_STR);
    $statement->bindValue(':itemsoft', $itemsoft, PDO::PARAM_STR);
    $statement->bindValue(':valuesoft', $valuesoft, PDO::PARAM_INT);


    $statement->execute(); // Execute a prepared request

    $softSkill = $statement->fetchAll(); // Get data
    header( 'location: ../index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Softskill</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <form action="" method="post">
            <label for="namesoft">Nom du softskill</label>
            <input type="text" id="namesoft" name="namesoft" required>

            <label for="itemsoft">item du softskill</label>
            <input type="text" id="itemsoft" name="itemsoft" required>

            <label for="valuesoft">niveau de maitrise (%)</label>
            <input type="number" id="valuesoft" name="valuesoft" required>

            <input class="submit" type="submit" value="submit">
            <a href="read.php">Retour</a>
        </form>

    </div>

</body>
</html>
