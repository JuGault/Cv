<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Experience</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="read-experience">
        <div id="references">
            <div class="titres">
                <span></span><h2>Expériences Professionnelles</h2><span></span>
            </div>

            <div class="experience">
                <a href="createexperience.php">Créer une Expérience professionnelle</a>
                <?php

                $query = "SELECT * FROM experience";
                $statement = $pdo->query($query);
                $experiences = $statement->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <?php foreach ($experiences as $poste) : ?>
                <div class="experience-item">
                    <div>
                        <p><span></span><?php echo htmlentities($poste['nameexperience']) . ' : ' ?></p>
                        <p class="infoPoste"><?php echo htmlentities($poste['lieu']) .' en (' . htmlentities($poste['debut']) ?><?= htmlentities($fin = (empty($poste['fin'])) ? ').' : '/' . $poste['fin'] . ').'); ?></p>
                    </div>
                    <div class="read-btn">
                        <form action="deleteexperience.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlentities($poste['id']) ?>">
                            <button>Delete</button>
                        </form>
                        <form action="updateexperience.php" method="get">
                            <input type="hidden" name="id" value="<?= htmlentities($poste['id']) ?>">
                            <button>Edit</button>
                        </form>
                    </div>
                </div>


                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <div id="formation">
            <div class="titres">
                <span></span><h2>Formation</h2><span></span>
            </div>

            <div class="formation">
                <?php
                $query = "SELECT * FROM formation";
                $statement = $pdo->query($query);
                $formations = $statement->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <a href="createformation.php">Créer une Formation</a>
                <?php foreach ($formations as $formation) : ?>
                <div class="formation-item">
                    <div>
                        <span></span><p><?php echo htmlentities($formation['nameformation']) . ' à ' . htmlentities($formation['lieu']) . ' en ' . htmlentities($formation['debut']) . htmlentities($fin = (empty($formation['fin'])) ? ').' : '/' . $formation['fin'] . ').'); ?></p>
                    </div>
                    <div class="read-btn">
                        <form action="deleteformation.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlentities($formation['id']) ?>">
                            <button>Delete</button>
                        </form>
                        <form action="updateformation.php" method="get">
                            <input type="hidden" name="id" value="<?= htmlentities($formation['id']) ?>">
                            <button>Edit</button>
                        </form>
                    </div>

                </div>

                <?php endforeach; ?>
            </div>
        </div>
        <a href="../php/Edit.php">Retour</a>
    </div>

</body>
</html>

