<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$query = "SELECT * FROM project";
$statement = $pdo->query($query);
$project = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Project</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

    <div class="read-projet">
        <div class="titres">
            <span></span><h2>Projets</h2><span></span>
        </div>
        <a href="createproject.php">Créer compétence</a>
        <div class="all-projets">
            <?php foreach ($project as $projects) : ?>
                <div class="projet">
                    <article>
                        <a href="<?php echo htmlentities($projects['link']) ?>" target="_blank">
                            <img src="<?php echo htmlentities($projects['picture']) ?>" alt="picture <?php echo htmlentities($projects['nameproject']) ?>" >
                            <?php echo htmlentities($projects['nameproject']) ?></a>
                    </article>
                    <div class="read-btn">
                        <form action="deleteproject.php" method="post">
                            <input type="hidden" name="id" value="<?= $projects['id'] ?>">
                            <button>Delete</button>
                        </form>
                        <form action="updateproject.php" method="get">
                            <input type="hidden" name="id" value="<?= $projects['id'] ?>">
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

