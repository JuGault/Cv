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
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
foreach ($_POST as $key => $value) {
    $data[$key] = trim($value);
}

if (empty($data['nameproject'])) {
    $errors['nameproject'] = 'The nameproject is empty';
}
if (strlen($data['nameproject']) > 50) {
    $errors['nameproject'] = 'This nameproject is too long';
}
if (empty($data['picture'])) {
    $errors['picture'] = 'The picture is empty';
}
if (strlen($data['picture']) > 250) {
    $errors['picture'] = 'This picture is too long';
}
if (empty($data['link'])) {
    $errors['link'] = 'The link is empty';
}
if (strlen($data['link']) > 150) {
    $errors['link'] = 'This link is too long';
}
if (empty($errors)) {
    $congratulation = 'Merci votre ' . htmlentities($data['nameinfo']) . ' a bien été mis à jour!.';
    $query = "UPDATE project SET nameproject= :nameproject, picture= :picture, link= :link WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameproject', $data['nameproject'], PDO::PARAM_STR);
    $statement->bindValue(':picture', $data['picture'], PDO::PARAM_STR);
    $statement->bindValue(':link', $data['link'], PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $project = $statement->fetchAll(); // Get data
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
    <title>Update project</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-update">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameproject">Nom du projet</label>
            <input type="text" id="nameproject" name="nameproject" value="<?= htmlentities($project['nameproject']) ?>" required>
            <div class="errors"><?= $errors['nameproject'] ?? '' ?></div>
            <label for="picture">Image du projet</label>
            <input type="text" id="picture" name="picture" value="<?= htmlentities($project['picture']) ?>" required>
            <div class="errors"><?= $errors['picture'] ?? '' ?></div>
            <label for="link">lien du projet</label>
            <input type="url" id="link" name="link" value="<?= htmlentities($project['link']) ?>" required>
            <div class="errors"><?= $errors['link'] ?? '' ?></div>
            <input class="submit" type="submit" value="edit">
            <a href="readproject.php">Retour</a>
        </form>

    </div>

</body>
</html>
