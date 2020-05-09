<?php
    $firstname = 'Julien Gault';
    $posteDescription = 'développeur Web et Mobile';
    $presentation = 'Actuellement en formation à la "Wild Code School" , je suis à la recherche d\'un stage pour concrétiser ma formation.';
?>



<header id="haut">

    <div class="description">
        <div class="speatch">
            <div id="noms">
                <h1><?php echo $firstname ?></h1>
                <p><?php echo $posteDescription ?></p>
            </div>
            <div id="demande">
                <p><?php echo $presentation?></p>
            </div>
        </div>

        <div class="My-picture">
                <img src="../Images/Moi.JPG" alt="Photo Julien Gault">
        </div>



    </div>

</header>
