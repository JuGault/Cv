<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM experience WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$experience = $statement->fetch(PDO::FETCH_ASSOC);


$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "UPDATE experience SET nameexperience= :nameexperience , lieu= :lieu , debut= :debut , fin= :fin WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameexperience', $data['nameexperience'], PDO::PARAM_STR);
    $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
    $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
    $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $experience = $statement->fetchAll(); // Get data
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
    <title>Update Expérience</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<form action="" method="post">
    <label for="nameexperience">Nom du poste</label>
    <input type="text" id="nameexperience" name="nameexperience" value="<?= $experience['nameexperience'] ?>" required>

    <label for="lieu">Nom et/ou Adresse de l'employeur</label>
    <input type="text" id="lieu" name="lieu" value="<?= $experience['lieu'] ?>" required>

    <label for="debut">Année du début du poste</label>
    <input type="number" id="debut" name="debut" value="<?= $experience['debut'] ?>" required>

    <label for="fin">Année de fin du poste</label>
    <input type="number" id="fin" name="fin" value="<?= $fin = (empty($experience['fin'])) ? '' :  $experience['fin']?>">

    <input type="submit" value="submit">

</form>

</body>
</html>
