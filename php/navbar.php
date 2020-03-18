<?php
    include 'menuNavBar.php';
?>
    <div class="links" id="links">
        <?php foreach ($itemsMenu as $nameItems => $links) : ?>
        <a href="<?php echo $links ?>"><?php echo $nameItems ?></a>
        <?php endforeach; ?>
    </div>
    <a class="main-navigation" href="#links"><img src="Images/batlogo.png" alt=""></a>

