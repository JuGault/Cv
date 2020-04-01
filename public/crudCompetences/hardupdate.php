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
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "UPDATE competence SET namecompetence= :namecompetence, valuecompetence= :valuecompetence WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':namecompetence', $data['namecompetence'], PDO::PARAM_STR);
    $statement->bindValue(':valuecompetence', $data['valuecompetence'], PDO::PARAM_INT);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $competence = $statement->fetchAll(); // Get data
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
    <title>Update Compétence</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<form action="" method="post">
    <label for="namecompetence">Nom de la compétence</label>
    <input type="text" id="namecompetence" name="namecompetence" value="<?= $competence['namecompetence'] ?>" required>

    <label for="valuecompetence"></label>
    <input type="number" id="valuecompetence" name="valuecompetence" value="<?= $competence['valuecompetence'] ?>" required>

    <button>edit</button>

</form>

</body>
</html>
