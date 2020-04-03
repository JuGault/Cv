<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM experience WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$experience = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    if (empty($data['nameexperience'])) {
        $errors['nameexperience'] = 'The nameexperience is empty';
    }
    if (strlen($data['nameexperience']) > 100) {
        $errors['nameexperience'] = 'This nameexperience is too long';
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
        $congratulation = 'Merci votre ' . htmlentities($data['nameexperience']) . ' a bien été mis à jour!.';


        $query = "UPDATE experience SET nameexperience= :nameexperience , lieu= :lieu , debut= :debut , fin= :fin WHERE id= :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':nameexperience', $data['nameexperience'], PDO::PARAM_STR);
        $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
        $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
        $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute(); // Execute a prepared request

        $experience = $statement->fetchAll(); // Get data
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
    <title>Update Expérience</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-update">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameexperience">Nom du poste</label>
            <input type="text" id="nameexperience" name="nameexperience" value="<?= htmlentities($experience['nameexperience']) ?>" required>
            <div class="errors"><?= $errors['nameexperience'] ?? '' ?></div>
            <label for="lieu">Nom et/ou Adresse de l'employeur</label>
            <input type="text" id="lieu" name="lieu" value="<?= htmlentities($experience['lieu']) ?>" required>
            <div class="errors"><?= $errors['lieu'] ?? '' ?></div>
            <label for="debut">Année du début du poste</label>
            <input type="number" id="debut" name="debut" value="<?= htmlentities($experience['debut']) ?>" required>
            <div class="errors"><?= $errors['debut'] ?? '' ?></div>
            <label for="fin">Année de fin du poste</label>
            <input type="number" id="fin" name="fin" value="<?= htmlentities($fin = (empty($experience['fin'])) ? '' :  $experience['fin'])?>">
            <div class="errors"><?= $errors['fin'] ?? '' ?></div>
            <input class="submit" type="submit" value="edit">
            <a href="readexperience.php">Retour</a>
        </form>

    </div>

</body>
</html>
