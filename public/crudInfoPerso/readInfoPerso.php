<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$query = "SELECT * FROM infoPerso";
$statement = $pdo->query($query);
$infoPerso = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read InfoPerso</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="read-infoPerso">
        <a href="createInfoPerso.php">Créer une information personnelle</a>
        <div class="general-info">
            <?php foreach ($infoPerso as $info) : ?>
                <div class="Info-perso">
                    <img src="<?php echo $info['icon'] ?>" alt="icone-<?php echo $info['nameinfo'] ?>">
                    <p style="font-weight: 900; text-decoration: underline; "><?php echo $info['nameinfo'] ?> :</p>
                    <p><?php echo $info['info'] ?></p>
                    <div class="read-btn">
                        <form action="deleteInfoPerso.php" method="post">
                            <input type="hidden" name="id" value="<?= $info['id'] ?>">
                            <button>Delete</button>
                        </form>
                        <form action="updateInfoPerso.php" method="get">
                            <input type="hidden" name="id" value="<?= $info['id'] ?>">
                            <button>Edit</button>
                        </form>
                    </div>
                </div><?php endforeach; ?>
        </div>
        <a href="../php/Edit.php">Retour</a>
    </div>

</body>
</html>
