<?php

$query = "SELECT * FROM competence";
$statement = $pdo->query($query);
$competence = $statement->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM softSkill";
$statement = $pdo->query($query);
$softSkill = $statement->fetchAll(PDO::FETCH_ASSOC);
?>




<section id="competences">
    <div class="titres">
        <span></span><h2>Compétences</h2><span></span>
    </div>
    <div class="skills">
        <div class="hard-skills">
                <div class="title-skill">
                    <img src="../Images/skills.svg" alt="Hard Skill icon">
                    <h3>Hard-Skills</h3>
                </div>

                <?php foreach ($competence as $competences) : ?>
                    <div>

                        <p class="tittle-hard-skill"><span></span><?php echo htmlentities($competences['namecompetence']) ?></p>
                        <div class="proggress"  style=" width: <?php echo htmlentities($competences['valuecompetence'])/5 ?>%;"><?php echo htmlentities($competences['valuecompetence']) ?>%</div>



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
                <?php foreach ($softSkill as $skills ) : ?>
                    <div>
                        <p class="tittle-soft-skill"><span></span><?php echo $skills['namesoft'] . ' : ' ?></p>
                        <p class="precisionSkill">( <?php echo $skills['itemsoft'] ?> )</p>
                        <div class="proggress"  style=" width: <?php echo $skills['valuesoft']/5 ?>%;"><?php echo $skills['valuesoft'] . '%' ?></div>
                    </div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>


</section>