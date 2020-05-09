<section id="experiences">
        <div id="references">
            <div class="titres">
                <span></span><h2>Expériences Professionnelles</h2><span></span>
            </div>

            <div class="experience">
                <?php

                $query = "SELECT * FROM experience";
                $statement = $pdo->query($query);
                $experiences = $statement->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <?php foreach ($experiences as $poste) : ?>
                <div>
                    <p><span></span><?php echo $poste['nameexperience'] . ' : ' ?></p>
                    <p class="infoPoste"><?php echo $poste['lieu'] .' en (' . $poste['debut'] ?><?= $fin = (empty($poste['fin'])) ? ').' : '/' . $poste['fin'] . ').'; ?></p>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    <hr>
    <div id="formation">
        <div class="titres">
            <span></span><h2>Formation</h2><span></span>
        </div>

        <div class="formation">
            <?php
            $query = "SELECT * FROM formation";
            $statement = $pdo->query($query);
            $formations = $statement->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <?php foreach ($formations as $formation) : ?>
                <div>
                    <span></span><p><?php echo $formation['nameformation'] . ' à ' . $formation['lieu'] . ' en ' . $formation['debut'] . $fin = (empty($formation['fin'])) ? ').' : '/' . $formation['fin'] . ').'; ?></p>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>