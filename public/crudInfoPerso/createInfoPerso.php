<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "INSERT INTO infoPerso (nameinfo , info, icon) VALUES ( :nameinfo , :info, :icon)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameinfo', $data['nameinfo'], PDO::PARAM_STR);
    $statement->bindValue(':info', $data['info'], PDO::PARAM_STR);
    $statement->bindValue(':icon', $data['icon'], PDO::PARAM_INT);


    $statement->execute(); // Execute a prepared request

    $infoPerso = $statement->fetchAll(); // Get data
    header('location: ../index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create InfoPerso</title>
</head>
<body>
<form action="" method="post">
    <label for="nameinfo">Nom de l'information</label>
    <input type="text" id="nameinfo" name="nameinfo" required>

    <label for="info">information</label>
    <input type="text" id="info" name="info" required>

    <label for="icon">Chemin de l'icone</label>
    <input type="text" id="icon" name="icon" required>


    <input type="submit" value="submit">

</form>

</body>
</html>
