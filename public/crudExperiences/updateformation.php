<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM formation WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$formation = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];
$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    if (empty($data['nameformation'])) {
        $errors['nameformation'] = 'The nameformation is empty';
    }
    if (strlen($data['nameformation']) > 100) {
        $errors['nameformation'] = 'This nameformation is too long';
    }
    if (empty($data['lieu'])) {
        $errors['lieu'] = 'The lieu is empty';
    }
    if (strlen($data['lieu']) > 100) {
        $errors['lieu'] = 'This lieu is too long';
    }
    if (empty($data['debut'])) {
        $errors['debut'] = 'The debut is empty';
    }
    if (strlen($data['debut']) == 4) {
        $errors['debut'] = 'This debut is wrong, the format must be AAAA .';
    }

    if (strlen($data['fin']) == 4) {
        $errors['fin'] = 'This fin is wrong, the format must be AAAA';
    }

    if (empty($errors)) {
        $congratulation = 'Merci votre ' . htmlentities($data['nameformation']) . ' a bien été mis à jour!.';

        $query = "UPDATE formation SET nameformation= :nameformation , lieu= :lieu , debut= :debut , fin= :fin WHERE id= :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':nameformation', $data['nameformation'], PDO::PARAM_STR);
        $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
        $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
        $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

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
    <title>Update Formation</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-update">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameformation">Nom de la formation</label>
            <input type="text" id="nameformation" name="nameformation" value="<?= htmlentities($formation['nameformation']) ?>" required>
            <div class="errors"><?= $errors['nameformation'] ?? '' ?></div>
            <label for="lieu">Nom et/ou Adresse du lieu de formation</label>
            <input type="text" id="lieu" name="lieu" value="<?= htmlentities($formation['lieu']) ?>" required>
            <div class="errors"><?= $errors['lieu'] ?? '' ?></div>
            <label for="debut">Année du début de la formation</label>
            <input type="number" id="debut" name="debut" value="<?= htmlentities($formation['debut']) ?>" required>
            <div class="errors"><?= $errors['debut'] ?? '' ?></div>
            <label for="fin">Année de fin de la formation</label>
            <input type="number" id="fin" name="fin"
                   value="<?= htmlentities($fin = (empty($formation['fin'])) ? '' : $formation['fin']) ?>">
            <div class="errors"><?= $errors['fin'] ?? '' ?></div>
            <input class="submit" type="submit" value="edit">
            <a href="readexperience.php">Retour</a>
        </form>

    </div>

</body>
</html>
