<?php
    $competences = [
        'Disrétion' => 'Grâce à mes nombreuses missions d\'infiltration de nuit dans les quartiers difficiles de Gotham, j\'ai acquis une discretion quasi surnaturelle me permettant de prendre les malfrats sur le fait.',
        'Investigation' => 'N\'ayant pas usurpé le titre de plus grand détective du monde, je suis à même de déjouer les plans machiavéliques de n\'importe quel adversaire, même les plus fourbes.',
        'Justice' => 'Par l\'alliance de mes capacités physiques hors-normes et de mes bat-gadgets fabriqués maison, les bandits n\'échappent plus au joug sacré de la justice des hommes.',
    ];
?>




<section id="competences">
    <div class="titres">
        <h2>Compétences</h2>
    </div>
    <ul>
        <?php foreach ($competences as $comp => $textDescription) : ?>
        <li>
            <p class="comp_nom"><?php echo $comp ?></p>
            <p class="comp_description"><?php echo $textDescription ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
</section>