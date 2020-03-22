<?php
    $competences = [
        'HTML' => 40,
        'CSS' => 40,
        'Responsive Design' => 50,
        'PHP' => 30,
        'SQL' => 20,
    ];
    $softSkills = [
        'Ouverture d\'esprit et curiosité' => ['curieux','observateur', 'envie d\'apprendre'], [80],
        'Esprit et travail d\'équipe' => ['sociable', 'travail en réseaux', 'formation transmission du savoir'], [70],
        'Adaptabilité' => ['adaptable', 'attentif', 'coopératif', 'respectueux'], [90],
        'Communication' => ['gestion de conflit', 'lecture language corporel', 'sens de l\'écoute', 'négociation', 'ect..'],[90],
    ];
?>




<section id="competences">
    <div class="titres">
        <h2><span></span>Compétences<span></span></h2>
    </div>
    <div class="skills">
        <div class="hard-skills">
                <div class="title-skill">
                    <img src="../Images/skills.svg" alt="Hard Skill icon">
                    <h3>Hard-Skills</h3>
                </div>

                <?php foreach ($competences as $comp => $textDescription) : ?>
                <div>
                        <span></span><p><?php echo $comp ?></p>
                        <progress max="100" value="<?php echo $textDescription ?>"></progress>
                        <p><?php echo $textDescription ?></p>


                </div>
                <?php endforeach; ?>
        </div>
        <hr>
        <div class="soft-skills">
            <div class="title-skill">
                <img src="../Images/skill.svg" alt="Soft Skill icon">
                <h3>Soft-Skills</h3>
            </div>
            <div>
                <?php foreach ($softSkills as $skills => $skillItem) : ?>
                    <p><span></span><?php echo $skills . ' : ' ?></p>
                    <p><?php foreach ($skillItem as $info ) : echo $info . "\n" ?><?php endforeach; ?></p>

                <?php endforeach; ?>
            </div>
        </div>
    </div>


</section>