<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM formation WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$formation = $statement->fetch(PDO::FETCH_ASSOC);


$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "UPDATE formation SET nameformation= :nameformation , lieu= :lieu , debut= :debut , fin= :fin WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameformation', $data['nameformation'], PDO::PARAM_STR);
    $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
    $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
    $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $formation = $statement->fetchAll(); // Get data
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
    <title>Update Formation</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-update">
        <form action="" method="post">
            <label for="nameformation">Nom de la formation</label>
            <input type="text" id="nameformation" name="nameformation" value="<?= $formation['nameformation'] ?>" required>

            <label for="lieu">Nom et/ou Adresse du lieu de formation</label>
            <input type="text" id="lieu" name="lieu" value="<?= $formation['lieu'] ?>" required>

            <label for="debut">Année du début de la formation</label>
            <input type="number" id="debut" name="debut" value="<?= $formation['debut'] ?>" required>

            <label for="fin">Année de fin de la formation</label>
            <input type="number" id="fin" name="fin"
                   value="<?= $fin = (empty($formation['fin'])) ? '' : $formation['fin'] ?>">

            <input class="submit" type="submit" value="edit">
            <a href="readexperience.php">Retour</a>
        </form>

    </div>

</body>
</html>
