<?php
 $allProjects = [
     'projects'=> ['nameProject'=> 'Cv Batman', 'pictureProject'=>'../Images/Screenshot_2020-03-25 CV de Batman.png', 'linksProject' =>'https://github.com/JuGault/cvBatman',],
     'projects2'=> ['nameProject'=> 'Cv julien', 'pictureProject'=>'../Images/Screenshot_2020-03-25 CV Julien Gault.png', 'linksProject' =>'https://github.com/JuGault/Cv',],
 ];
?>

<section id="projets">
    <div class="titres">
        <h2 id="xp"><span></span>Projets<span></span></h2>
    </div>
    <div class="all-projects">
        <?php foreach ($allProjects as $project) : ?>
            <article class="projects" >
                <a href="<?php echo $project['linksProject'] ?>">
                <img src="<?php echo $project['pictureProject'] ?>" alt="picture <?php echo $project['nameProject'] ?>">
                <?php echo $project['nameProject'] ?></a>
            </article>
        <?php endforeach; ?>
    </div>

</section>
