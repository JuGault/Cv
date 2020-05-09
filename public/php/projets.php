<?php

$query = "SELECT * FROM project";
$statement = $pdo->query($query);
$allProjects = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="projets">
    <div class="titres">
        <span></span><h2>Projets</h2><span></span>
    </div>
    <div class="all-projects">
        <?php foreach ($allProjects as $project) : ?>
            <article class="projects" >
                <a href="<?php echo htmlentities($project['link']) ?>" target="_blank">
                <img src="<?php echo htmlentities($project['picture']) ?>" alt="picture <?php echo htmlentities($project['nameproject']) ?>" >
                <?php echo htmlentities($project['nameproject']) ?></a>
            </article>
        <?php endforeach; ?>
    </div>

</section>
