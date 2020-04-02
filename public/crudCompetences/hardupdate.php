<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';


$id = trim($_GET['id']);
$query = "SELECT * FROM competence WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$competence = $statement->fetch(PDO::FETCH_ASSOC);

$data = [];
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }
    if (empty($data['namecompetence'])) {
        $errors['namecompetence'] = 'The namecompetence is empty';
    }
    if (50 > strlen($data['namecompetence'])) {
        $errors['namecompetence'] = 'This namecompetence is too long';
    }

    if (3 > strlen($data['valuecompetence'])) {
        $errors['valuecompetence'] = 'This valuecompetence is too long';
    }
    if (empty($data['valuecompetence'])) {
        $errors['valuecompetence'] = 'The valuecompetence is empty';
    }

    if (empty($errors)) {
        $congratulation = 'Merci votre ' . htmlentities($data['namecompetence']) . ' a bien été mis à jour!.';


        $query = "UPDATE competence SET namecompetence= :namecompetence, valuecompetence= :valuecompetence WHERE id= :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':namecompetence', $data['namecompetence'], PDO::PARAM_STR);
        $statement->bindValue(':valuecompetence', $data['valuecompetence'], PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute(); // Execute a prepared request

        $competence = $statement->fetchAll(); // Get data
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
    <title>Update Compétence</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-update">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="namecompetence">Nom de la compétence</label>
            <input type="text" id="namecompetence" name="namecompetence" value="<?= htmlentities($competence['namecompetence']) ?>" required>
            <div class="errors"><?= $errors['namecompetence'] ?? '' ?></div>
            <label for="valuecompetence">Niveau de maitrise de la compétence (%)</label>
            <input type="number" id="valuecompetence" name="valuecompetence" value="<?= htmlentities($competence['valuecompetence']) ?>" required>
            <div class="errors"><?= $errors['valuecompetence'] ?? '' ?></div>
            <input class="submit" type="submit" value="edit">
            <a href="read.php">Retour</a>
        </form>

    </div>

</body>
</html>
