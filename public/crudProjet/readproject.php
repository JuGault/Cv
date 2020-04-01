<?php
require '../../src/connec.php';
require '../../src/databaseConnection.php';

$query = "SELECT * FROM project";
$statement = $pdo->query($query);
$project = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="titres">
    <span></span><h2>Projets</h2><span></span>
</div>
<a href="createproject.php">Créer compétence</a>
<div class="all-projects">
    <?php foreach ($project as $projects) : ?>
        <article class="projects" >
            <a href="<?php echo htmlentities($projects['link']) ?>" target="_blank">
                <img src="<?php echo htmlentities($projects['picture']) ?>" alt="picture <?php echo htmlentities($projects['nameproject']) ?>" >
                <?php echo htmlentities($projects['nameproject']) ?></a>
        </article>
        <form action="deleteproject.php" method="post">
            <input type="hidden" name="id" value="<?= $projects['id'] ?>">
            <button>Delete</button>
        </form>
        <form action="updateproject.php" method="get">
            <input type="hidden" name="id" value="<?= $projects['id'] ?>">
            <button>Edit</button>
        </form>
    <?php endforeach; ?>

</div>
