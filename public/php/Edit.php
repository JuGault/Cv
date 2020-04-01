<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editer votre Cv</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

    <div class="edit">
            <h2>Editer votre Cv</h2>
            <form action="../crudCompetences/read.php" method="post">
                <button>Compétences</button>
            </form>
            <form action="../crudProjet/readproject.php" method="post">
                <button>Projets</button>
            </form>
            <form action="../crudExperiences/readexperience.php" method="post">
                <button>Expériences</button>
            </form>
            <form action="../crudInfoPerso/readInfoPerso.php" method="post">
                <button>Info Perso</button>
            </form>
        <form action="../index.php" method="post">
            <button>Retour</button>
        </form>
    </div>


</body>
</html>
