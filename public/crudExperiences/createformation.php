<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$errors = [];
$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
foreach ($_POST as $key => $value) {
    $data[$key] = trim($value);
}

if (empty($data['nameformation'])) {
    $errors['nameformation'] = 'The nameformation is empty';
}
if (100 > strlen($data['nameformation'])) {
    $errors['nameformation'] = 'This nameformation is too long';
}
if (empty($data['lieu'])) {
    $errors['lieu'] = 'The lieu is empty';
}
if (100 > strlen($data['lieu'])) {
    $errors['lieu'] = 'This lieu is too long';
}
if (empty($data['debut'])) {
    $errors['debut'] = 'The debut is empty';
}
if (4 == strlen($data['debut'])) {
    $errors['debut'] = 'This debut is wrong, the format must be AAAA .';
}

if (4 == strlen($data['fin'])) {
    $errors['fin'] = 'This fin is wrong, the format must be AAAA';
}

if (empty($errors)) {
    $congratulation = 'Merci votre ' . htmlentities($data['nameformation']) . ' a bien été ajouté!.';

    $query = "INSERT INTO formation (nameformation , lieu, debut, fin) VALUES ( :nameformation , :lieu, :debut, :fin)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameformation', $data['nameformation'], PDO::PARAM_STR);
    $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
    $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
    $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $formation = $statement->fetchAll(); // Get data
    sleep(2);
    header('location: ../index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Formation</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="form-create">
    <?php if (!empty($congratulation)) : ?>
        <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
    <form action="" method="post">
        <label for="nameformation">Nom de la formation</label>
        <input type="text" id="nameformation" name="nameformation" required>
        <div class="errors"><?= $errors['nameformation'] ?? '' ?></div>
        <label for="lieu">Nom et/ou Adresse du lieu de formation</label>
        <input type="text" id="lieu" name="lieu" required>
        <div class="errors"><?= $errors['lieu'] ?? '' ?></div>
        <label for="debut">Année du début de formation</label>
        <input type="number" id="debut" name="debut" required>
        <div class="errors"><?= $errors['debut'] ?? '' ?></div>
        <label for="fin">Année de fin de formation</label>
        <input type="number" id="fin" name="fin">
        <div class="errors"><?= $errors['fin'] ?? '' ?></div>
        <input class="submit" type="submit" value="submit">
        <a href="readexperience.php">Retour</a>
    </form>

</div>

</body>
</html>