<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$namecompetence = [];
$valuecompetence = [] ;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $namecompetence = trim($_POST['namecompetence']);
    $valuecompetence = trim($_POST['valuecompetence']);
    $query = "INSERT INTO competence (namecompetence , valuecompetence) VALUES ( :namecompetence, :valuecompetence )";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':namecompetence', $namecompetence, PDO::PARAM_STR);
    $statement->bindValue(':valuecompetence', $valuecompetence, PDO::PARAM_INT);


    $statement->execute(); // Execute a prepared request

    $hardcompetence = $statement->fetchAll(); // Get data
    header( 'location: ../index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Compétence</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="form-create">
        <form action="" method="post">
            <label for="namecompetence">Nom de la compétence</label>
            <input type="text" id="namecompetence" name="namecompetence" required>

            <label for="valuecompetence">niveau de maitrise de la compétence (%)</label>
            <input type="number" id="valuecompetence" name="valuecompetence" required>

            <input class="submit" type="submit" value="submit">
            <a href="read.php">Retour</a>
        </form>

    </div>

</body>
</html>
