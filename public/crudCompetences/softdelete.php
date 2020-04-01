<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$id = trim($_POST['id']);
$query = "SELECT * FROM softSkill WHERE id= :id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

$softSkill = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $query = "DELETE FROM softSkill WHERE id=$id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header( 'location: ../index.php');
}

?>