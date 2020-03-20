<?php
    $competences = [
        'HTML' => 'Maitrise des bases de la création de page hmtl',
        'CSS' => 'Utilisation du CSS pour styliser les pages HTML',
        'Responsive Design' => 'Maitrise du responsive design pour dévellopement mobile et desktop',
        'PHP' => 'Maitrise du language PHP pour dynamiser les sites Web',
    ];
?>




<section id="competences">
    <div class="titres">
        <h2><span></span>Compétences<span></span></h2>
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