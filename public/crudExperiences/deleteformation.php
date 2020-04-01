<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$id = trim($_POST['id']);
$query = "SELECT * FROM formation WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

$formation = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $query = "DELETE FROM formation WHERE id=$id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header('location: ../index.php');
}
