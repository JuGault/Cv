<?php

$itemsMenu = [
    'Compétences' => '#competences',
    'Projets' => '#projets',
    'Contact' => '#contact',
    'Retour' => '#',
];
?>

<a class="main-navigation" href="#links"><img src="../Images/menu.svg" alt=""></a>
<div class="links" id="links">
    <?php foreach ($itemsMenu as $nameItems => $links) : ?>
    <a href="<?php echo $links ?>"><?php echo $nameItems ?></a>
    <?php endforeach; ?>
</div>


<nav class="headernav" id="headernav">
    <?php foreach ($itemsMenu as $nameItems => $links) : ?>
        <a href="<?php echo $links ?>"><?php echo $nameItems ?></a>
    <?php endforeach; ?>
</nav>
