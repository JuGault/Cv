<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM softSkill WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$softSkill = $statement->fetch(PDO::FETCH_ASSOC);


$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "UPDATE softSkill SET namesoft= :namesoft, itemsoft= :itemsoft, valuesoft= :valuesoft WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':namesoft', $data['namesoft'], PDO::PARAM_STR);
    $statement->bindValue(':itemsoft', $data['itemsoft'], PDO::PARAM_STR);
    $statement->bindValue(':valuesoft', $data['valuesoft'], PDO::PARAM_INT);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

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
    <title>Update Softskill</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<form action="" method="post">
    <label for="namesoft">Nom du softskill</label>
    <input type="text" id="namesoft" name="namesoft" value="<?= $softSkill['namesoft'] ?>" required>

    <label for="itemsoft">item du softskill</label>
    <input type="text" id="itemsoft" name="itemsoft" value="<?= $softSkill['itemsoft'] ?>" required>

    <label for="valuesoft">valeur du softskill</label>
    <input type="number" id="valuesoft" name="valuesoft" value="<?= $softSkill['valuesoft'] ?>" required>



    <input type="submit" value="submit">

</form>

</body>
</html>
