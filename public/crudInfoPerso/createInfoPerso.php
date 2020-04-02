<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$data = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    if (empty($data['nameinfo'])) {
        $errors['nameinfo'] = 'The nameinfo is empty';
    }
    if (100 > strlen($data['nameinfo'])) {
        $errors['nameinfo'] = 'This nameinfo is too long';
    }
    if (empty($data['info'])) {
        $errors['info'] = 'The info is empty';
    }
    if (100 > strlen($data['info'])) {
        $errors['info'] = 'This info is too long';
    }
    if (empty($data['icon'])) {
        $errors['icon'] = 'The icon is empty';
    }
    if (100 > strlen($data['icon'])) {
        $errors['icon'] = 'This icon is too long';
    }
    if (empty($errors)) {
        $congratulation = 'Merci votre ' . htmlentities($data['nameinfo']) . ' a bien été ajouté!.';


        $query = "INSERT INTO infoPerso (nameinfo , info, icon) VALUES ( :nameinfo , :info, :icon)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':nameinfo', $data['nameinfo'], PDO::PARAM_STR);
        $statement->bindValue(':info', $data['info'], PDO::PARAM_STR);
        $statement->bindValue(':icon', $data['icon'], PDO::PARAM_STR);


        $statement->execute(); // Execute a prepared request

        $infoPerso = $statement->fetchAll(); // Get data
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
    <title>Create InfoPerso</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameinfo">Nom de l'information</label>
            <input type="text" id="nameinfo" name="nameinfo" required>
            <div class="errors"><?= $errors['nameinfo'] ?? '' ?></div>
            <label for="info">Information</label>
            <input type="text" id="info" name="info" required>
            <div class="errors"><?= $errors['info'] ?? '' ?></div>
            <label for="icon">Chemin de l'icone</label>
            <input type="text" id="icon" name="icon" required>
            <div class="errors"><?= $errors['icon'] ?? '' ?></div>
            <input class="submit" type="submit" value="submit">
            <a href="readInfoPerso.php">Retour</a>
        </form>

    </div>

</body>
</html>
