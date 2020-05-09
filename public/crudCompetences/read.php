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
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="read-skills">
        <a href="hardcreate.php">Créer compétence</a>
        <div class="read-hard">
            <?php foreach ($competence as $infoCompetence): ?>

                <div class="Hard">
                    <p class="tittle-hard-skill"><span></span><?php echo htmlentities($infoCompetence['namecompetence']) ?></p>
                    <div class="proggress"  style=" width: <?php echo $infoCompetence['valuecompetence']/5 ?>%;"><?php echo htmlentities($infoCompetence['valuecompetence']) ?>%</div>
                    <div class="read-btn">
                        <form action="harddelete.php" method="post">
                            <input type="hidden" name="id" value="<?= $infoCompetence['id'] ?>">
                            <button>Delete</button>
                        </form>
                        <form action="hardupdate.php" method="get">
                            <input type="hidden" name="id" value="<?= $infoCompetence['id'] ?>">
                            <button>Edit</button>
                        </form>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>



        <a href="softcreate.php">Créer compétence</a>
        <div class="read-soft">
            <?php foreach ($softSkill as $skills ) : ?>
                <div class="Soft">
                    <p class="tittle-soft-skill"><span></span><?php echo htmlentities($skills['namesoft']) . ' : ' ?></p>
                    <p class="precisionSkill">( <?php echo htmlentities($skills['itemsoft']) ?> )</p>
                    <div class="proggress"  style=" width: <?php echo htmlentities($skills['valuesoft'])/5 ?>%;"><?php echo htmlentities($skills['valuesoft']) . '%' ?></div>
                    <div class="read-btn">
                        <form action="softdelete.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlentities($skills['id']) ?>">
                            <button>Delete</button>
                        </form>
                        <form action="softupdate.php" method="get">
                            <input type="hidden" name="id" value="<?= htmlentities($skills['id']) ?>">
                            <button>Edit</button>
                        </form>
                    </div>

                </div>


            <?php endforeach; ?>
        </div>
        <a href="../php/Edit.php">Retour</a>
    </div>


</body>
</html>
