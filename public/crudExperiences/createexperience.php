<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$data = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    if (empty($data['nameexperience'])) {
        $errors['nameexperience'] = 'The nameexperience is empty';
    }
    if (100 > strlen($data['nameexperience'])) {
        $errors['nameexperience'] = 'This nameexperience is too long';
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
        $congratulation = 'Merci votre ' . htmlentities($data['nameexperience']) . ' a bien été ajouté!.';

        $query = "INSERT INTO experience (nameexperience , lieu, debut, fin) VALUES ( :nameexperience , :lieu, :debut, :fin)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':nameexperience', $data['nameexperience'], PDO::PARAM_STR);
        $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
        $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
        $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);

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
    <title>Create Experience</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <?php if (!empty($congratulation)) : ?>
            <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="nameexperience">Nom du poste</label>
            <input type="text" id="nameexperience" name="nameexperience" required>
            <div class="errors"><?= $errors['nameexperience'] ?? '' ?></div>
            <label for="lieu">Nom et/ou Adresse de l'employeur</label>
            <input type="text" id="lieu" name="lieu" required>
            <div class="errors"><?= $errors['lieu'] ?? '' ?></div>
            <label for="debut">Année du début du poste</label>
            <input type="number" id="debut" name="debut" required>
            <div class="errors"><?= $errors['debut'] ?? '' ?></div>
            <label for="fin">Année de fin du poste</label>
            <input type="number" id="fin" name="fin" >
            <div class="errors"><?= $errors['fin'] ?? '' ?></div>
            <input class="submit" type="submit" value="submit">
            <a href="readexperience.php">Retour</a>
        </form>

    </div>

</body>
</html>
