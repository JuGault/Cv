<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';


$data = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    $query = "INSERT INTO experience (nameexperience , lieu, debut, fin) VALUES ( :nameexperience , :lieu, :debut, :fin)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameexperience', $data['nameexperience'], PDO::PARAM_STR);
    $statement->bindValue(':lieu', $data['lieu'], PDO::PARAM_STR);
    $statement->bindValue(':debut', $data['debut'], PDO::PARAM_INT);
    $statement->bindValue(':fin', $data['fin'], PDO::PARAM_INT);

    $statement->execute(); // Execute a prepared request

    $experience = $statement->fetchAll(); // Get data
    header('location: ../index.php');
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
</head>
<body>
    <form action="" method="post">
        <label for="nameexperience">Nom du poste</label>
        <input type="text" id="nameexperience" name="nameexperience" required>

        <label for="lieu">Nom et/ou Adresse de l'employeur</label>
        <input type="text" id="lieu" name="lieu" required>

        <label for="debut">Année du début du poste</label>
        <input type="number" id="debut" name="debut" required>

        <label for="fin">Année de fin du poste</label>
        <input type="number" id="fin" name="fin" >

        <input type="submit" value="submit">

    </form>

</body>
</html>
