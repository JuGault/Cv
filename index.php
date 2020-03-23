<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV Julien Gault</title>
        <link rel="stylesheet" href="CSS/style.css">
        <meta name="author" content="Julien Gault">
    </head>

    <body>
        <?php
        include 'php/navbar.php';
        ?>

        <?php
            include 'php/header.php';
        ?>

        <?php
            include 'php/navbar2.php';
        ?>

        <main>

            <?php
                include 'php/competences.php';
            ?>

            <?php
                include 'php/projets.php';
            ?>

            <?php
                include 'php/experiences.php';
            ?>

            <?php
                include 'php/contact.php';
            ?>
        </main>

        <?php
            include 'php/footer.php';
        ?>
    </body>
</html>
