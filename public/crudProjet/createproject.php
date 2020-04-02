<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$data = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
foreach ($_POST as $key => $value) {
    $data[$key] = trim($value);
}

if (empty($data['nameproject'])) {
    $errors['nameproject'] = 'The nameproject is empty';
}
if (50 > strlen($data['nameproject'])) {
    $errors['nameproject'] = 'This nameproject is too long';
}
if (empty($data['picture'])) {
    $errors['picture'] = 'The picture is empty';
}
if (250 > strlen($data['picture'])) {
    $errors['picture'] = 'This picture is too long';
}
if (empty($data['link'])) {
    $errors['link'] = 'The link is empty';
}
if (150 > strlen($data['link'])) {
    $errors['link'] = 'This link is too long';
}
if (empty($errors)) {
    $congratulation = 'Merci votre ' . htmlentities($data['nameinfo']) . ' a bien été ajouté!.';
    $query = "INSERT INTO project (nameproject , picture, link) VALUES ( :nameproject, :picture, :link )";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameproject', $data['nameproject'], PDO::PARAM_STR);
    $statement->bindValue(':picture', $data['picture'], PDO::PARAM_STR);
    $statement->bindValue(':link', $data['link'], PDO::PARAM_STR);

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
    <title>Create project</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameproject">Nom du projet</label>
            <input type="text" id="nameproject" name="nameproject"  required>
            <div class="errors"><?= $errors['nameproject'] ?? '' ?></div>
            <label for="picture">Image du projet</label>
            <input type="text" id="picture" name="picture"  required>
            <div class="errors"><?= $errors['picture'] ?? '' ?></div>
            <label for="link">lien du projet</label>
            <input type="url" id="link" name="link"  required>
            <div class="errors"><?= $errors['link'] ?? '' ?></div>
            <input class="submit" type="submit" value="submit">
            <a href="readproject.php">Retour</a>
        </form>

    </div>

</body>
</html>
