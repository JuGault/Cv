<?php

require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM project WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$project = $statement->fetch(PDO::FETCH_ASSOC);


$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "UPDATE project SET nameproject= :nameproject, picture= :picture, link= :link WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameproject', $data['nameproject'], PDO::PARAM_STR);
    $statement->bindValue(':picture', $data['picture'], PDO::PARAM_STR);
    $statement->bindValue(':link', $data['link'], PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $project = $statement->fetchAll(); // Get data
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
    <title>Update project</title>
</head>
<body>
<form action="" method="post">
    <label for="nameproject">Nom du projet</label>
    <input type="text" id="nameproject" name="nameproject" value="<?= $project['nameproject'] ?>" required>

    <label for="picture">Image du projet</label>
    <input type="text" id="picture" name="picture" value="<?= $project['picture'] ?>" required>

    <label for="link">lien du projet</label>
    <input type="url" id="link" name="link" value="<?= $project['link'] ?>" required>


    <input type="submit" value="submit">

</form>

</body>
</html>
