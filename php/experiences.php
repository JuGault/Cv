<section id="experiences">
        <div id="references">
            <h2><span></span>Expériences Professionnelles<span></span></h2>
            <div class="experience">
                <?php

                $professionalExperience = [
                    'Moniteur Educateur' => ['EPMS Chancepoix (77)', '(2016/2018 )',],
                    'Educateur'=> ['Action Enfance Amilly (45)', '(2012/2016 )',],
                    'Animateur sociaux culturels' => ['Service enfance Mairie de Chalette sur Loing (45)', '(2011/2012 )',],
                ];

                ?>
                <?php foreach ($professionalExperience as $nomPoste => $poste) : ?>
                <div>
                    <span></span><p><?php echo $nomPoste . ' à ' ?><?php foreach ($poste as $info ) : echo $info . "\n" ?><?php endforeach; ?></p>
                </div>

                <?php endforeach; ?>
            </div>



        </div>
    <hr>
    <div id="formation">
        <h2><span></span>Formation<span></span></h2>
        <div class="formation">
            <?php
            $formation = [
                'Formation Dévellopeur Web (php/symfony)' => ['lieux' => 'Wild Code School Orléans' , 'dates' => ' en (2020)'],
                'Formation en interne Affectivité / Citoyenneté / Sexualité' => ['lieux' => 'EPMS Chancepoix 77', 'dates' => ' en (2017)'],
                'Formation Moniteur-éducateur' => [ 'lieux' => 'ERTS Olivet', 'dates' => ' de (2013/2015)'],
                'Lycée général section Scientifique (Bac S)' => [ 'lieux' => 'Lycée Augustin Thierry à Blois 41', 'dates' => ' en (2009)'],
            ];
            ?>
            <?php foreach ($formation as $whatFormation => $keys) : ?>
                <div>
                    <span></span><p><?php echo $whatFormation . ' à ' ?><?php foreach ($keys as $cara => $valor) : echo $valor ?><?php endforeach; ?></p>
                </div>

            <?php endforeach; ?>
        </div>

</section>