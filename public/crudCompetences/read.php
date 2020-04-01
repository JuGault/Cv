<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$query = "SELECT * FROM competence";
$statement = $pdo->query($query);
$competence = $statement->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM softSkill";
$statement = $pdo->query($query);
$softSkill = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listes compétences</title>
</head>
<body>
        <a href="hardcreate.php">Créer compétence</a>
        <?php foreach ($competence as $infoCompetence): ?>

            <div>
                <p class="tittle-hard-skill"><span></span><?php echo htmlentities($infoCompetence['namecompetence']) ?></p>
                <div class="proggress"  style=" width: <?php echo htmlentities($infoCompetence['valuecompetence'])/5 ?>%;"><?php echo htmlentities($infoCompetence['valuecompetence']) ?>%</div>
                <form action="harddelete.php" method="post">
                    <input type="hidden" name="id" value="<?= $infoCompetence['id'] ?>">
                    <button>Delete</button>
                </form>
                <form action="hardupdate.php" method="get">
                    <input type="hidden" name="id" value="<?= $infoCompetence['id'] ?>">
                    <button>Edit</button>
                </form>
            </div>

        <?php endforeach; ?>


        <a href="softcreate.php">Créer compétence</a>
        <?php foreach ($softSkill as $skills ) : ?>
            <div>
                <p class="tittle-soft-skill"><span></span><?php echo $skills['namesoft'] . ' : ' ?></p>
                <p class="precisionSkill">( <?php echo $skills['itemsoft'] ?> )</p>
                <div class="proggress"  style=" width: <?php echo $skills['valuesoft']/5 ?>%;"><?php echo $skills['valuesoft'] . '%' ?></div>
                <form action="softdelete.php" method="post">
                    <input type="hidden" name="id" value="<?= $skills['id'] ?>">
                    <button>Delete</button>
                </form>
                <form action="softupdate.php" method="get">
                    <input type="hidden" name="id" value="<?= $skills['id'] ?>">
                    <button>Edit</button>
                </form>
            </div>


        <?php endforeach; ?>
</body>
</html>
