<section id="experiences">
    <div id="enfants">
        <div>
            <h3>Références</h3>
        </div>
        <div id="references">
            <a id="JL" href="https://www.instagram.com/thedcuniverse/?hl=fr" target="_blank">
                <img src="Images/logoJL.jpg" alt="logo DC">
            </a>

            <a href="https://www.instagram.com/superman/" target="_blank">
                <img src="Images/logoSM.png" alt="Superman">
            </a>

            <a id="ww" href="https://www.instagram.com/wonderwoman/" target="_blank">
                <img src="Images/logoWW.png" alt="logo Wonder Woman">
            </a>
        </div>
    </div>
    <div>
    </div>
    <hr>
    <div id="formation">
        <h3>Formation</h3>
        <?php
                $formation = [
                    'Formation Dévellopeur Web (php/symfony)' => ['lieux' => 'Wild Code School Orléans', 'dates' => ' en (2020)'],
                    'Formation en interne Affectivité / Citoyenneté / Sexualité' => ['lieux' => 'EPMS Chancepoix 77', 'dates' => ' en (2017)'],
                    'Formation Moniteur-éducateur' => [ 'lieux' => 'ERTS Olivet', 'dates' => ' de (2013/2015)'],
                    'Lycée général section Scientifique (Bac S)' => [ 'lieux' => 'Lycée Augustin Thierry à Blois 41', 'dates' => ' en (2009)'],
                ];
        ?>
        <?php foreach ($formation as $whatFormation => $keys) : ?>
        <p><?php echo $whatFormation . ' à ' ?><?php foreach ($keys as $cara => $valor) : echo $valor ?><?php endforeach; ?></p>
        <?php endforeach; ?>
</section>