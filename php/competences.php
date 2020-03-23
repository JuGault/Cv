<?php
    $competences = [
        'HTML' => 40,
        'CSS' => 40,
        'Responsive Design' => 50,
        'PHP' => 30,
        'SQL' => 20,
    ];
    $softSkills = [
        'Ouverture d\'esprit et curiosité' =>['précisionskill' => ['curieux', 'observateur', 'envie d\'apprendre'], 'percent' => [70]],
        'Esprit et travail d\'équipe' => [ 'précisionskill' => ['sociable', 'travail en réseaux', 'formation transmission du savoir'], 'percent' => [70]],
        'Adaptabilité' => [ 'précisionskill' => ['adaptable', 'attentif', 'coopératif', 'respectueux'], 'percent' => [60]],
        'Communication' => [ 'précisionskill' => ['gestion de conflit', 'lecture language corporel', 'sens de l\'écoute', 'négociation', 'ect..'], 'percent' => [80]],
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
                    <div>

                        <p class="tittle-hard-skill"><span></span><?php echo $comp ?></p>
                        <div class="proggress"  style=" width: <?php echo $textDescription/5 ?>%;"></div>

                        <p class="value-skill"><?php echo $textDescription ?>%</p>


                    </div>
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
                    <div>
                        <p class="tittle-soft-skill"><span></span><?php echo $skills . ' : ' ?></p>
                        <?php foreach ($skillItem['précisionskill'] as $info ) :
                            $precisionSkills = implode(", ", $skillItem['précisionskill']); endforeach; ?>
                        <p class="precisionSkill">( <?php echo $precisionSkills ?> )</p>
                        <div class="proggress"  style=" width: <?php echo $skillItem['percent'][0]/5 ?>%;"><?php echo $skillItem['percent'][0] . '%' ?></div>
                    </div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>


</section>