<?php


require '../../src/connec.php';
require '../../src/databaseConnection.php';

$id = trim($_POST['id']);
$query = "SELECT * FROM infoPerso WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

$infoPerso = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $query = "DELETE FROM infoPerso WHERE id=$id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header('location: ../index.php');
}