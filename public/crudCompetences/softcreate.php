<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$data = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    if (empty($data['namesoft'])) {
        $errors['namesoft'] = 'The namesoft is empty';
    }
    if (50 > strlen($data['namesoft'])) {
        $errors['namesoft'] = 'This namesoft is too long';
    }

    if (255 > strlen($data['itemsoft'])) {
        $errors['itemsoft'] = 'This itemsoft is too long';
    }
    if (empty($data['itemsoft'])) {
        $errors['itemsoft'] = 'The itemsoft is empty';
    }
    if (3 > strlen($data['valuesoft'])) {
        $errors['valuesoft'] = 'This valuesoft is too long';
    }
    if (empty($data['valuesoft'])) {
        $errors['valuesoft'] = 'The valuesoft is empty';
    }


    if (empty($errors)) {
        $congratulation = 'Merci votre ' . htmlentities($data['namesoft']) . ' a bien été crée!.';

        $query = "INSERT INTO softSkill (namesoft , itemsoft, valuesoft) VALUES ( :namesoft, :itemsoft, :valuesoft )";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':namesoft', $data['namesoft'], PDO::PARAM_STR);
        $statement->bindValue(':itemsoft', $data['itemsoft'], PDO::PARAM_STR);
        $statement->bindValue(':valuesoft', $data['valuesoft'], PDO::PARAM_INT);


        $statement->execute(); // Execute a prepared request

        $softSkill = $statement->fetchAll(); // Get data
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
    <title>Create Softskill</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="namesoft">Nom du softskill</label>
            <input type="text" id="namesoft" name="namesoft" required>
            <div class="errors"><?= $errors['namesoft'] ?? '' ?></div>
            <label for="itemsoft">item du softskill</label>
            <input type="text" id="itemsoft" name="itemsoft" required>
            <div class="errors"><?= $errors['itemsoft'] ?? '' ?></div>
            <label for="valuesoft">niveau de maitrise (%)</label>
            <input type="number" id="valuesoft" name="valuesoft" required>
            <div class="errors"><?= $errors['valuesoft'] ?? '' ?></div>
            <input class="submit" type="submit" value="submit">
            <a href="read.php">Retour</a>
        </form>

    </div>

</body>
</html>
