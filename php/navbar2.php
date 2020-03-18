<?php
    include 'menuNavBar.php';
?>


<nav class="headernav" id="headernav">
    <?php foreach ($itemsMenu as $nameItems => $links) : ?>
        <a href="<?php echo $links ?>"><?php echo $nameItems ?></a>
    <?php endforeach; ?>
</nav>

