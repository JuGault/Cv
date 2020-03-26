<section id="contact">
    <?php
        $infoPerso = [
            'Name' => ['info' =>'Gault Julien', 'icon' => '../Images/name.svg'],
            'Date of birth' => ['info' =>'09.02.1991', 'icon' => '../Images/birthday.svg'],
            'Address' => ['info' =>'17 rue marie claude vaillant couturier 45120 Chalette sur Loing','icon' => '../Images/adress.svg'],
            'Phone' => ['info' =>'06.33.65.87.60','icon' => '../Images/contact.svg'],
            'Mail' => ['info' =>'jugault45@gmail.com', 'icon' => '../Images/mail.svg'],
        ];
    $infoCompany = [
        'Name' => ['Enter your name'],
        'Company' => ['Enter name of your company'],
        'Mail Address' => ['Enter your Email address'],
        'Phone' => ['Enter your phone number'],
    ];
    $forwhichPosition = ['Apprentice', 'Web develloper / Mobile develloper'];
    ?>
    <div class="titres">
        <span></span><h2>Contact me</h2><span></span>
    </div>
    <div class="contact">
        <div class="contact-info">
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=2.704406976699829%2C48.011745451766316%2C2.717850208282471%2C48.01817596352136&amp;layer=mapnik" style="border: 1px solid black"></iframe>

            <div class="general-info">
                <?php foreach ($infoPerso as $personalInfo => $info ) : ?>
                <div class="Info-perso">
                <img src="<?php echo $info['icon']  ?>" alt="icone-<?php echo $personalInfo ?>">
                <p style="font-weight: 900; text-decoration: underline; "><?php echo $personalInfo ?> :</p>
                <p><?php echo $info['info']  ?></p>
                </div><?php endforeach; ?>
            </div>
        </div>

        <form action="test.php" method="POST" id="formulaire_mail">
            <fieldset class="formulaire_mail">
                <div class="input-group">
                    <input type="text" placeholder="Enter your Name" id="name" name="Enter your Name">
                    <input type="text" placeholder="Company " id="Company" name="Companyname">
                    <input type="email" placeholder="Enter Your Email address " id="email" name="email">
                    <input type="text" placeholder="Enter your phone Number" id="phonenumber" name="phonenumber">

                </div>


                <div class="area-group">
                    <div class="Check-group">
                        <?php foreach ($forwhichPosition as $position) : ?>
                            <div class="single-check">
                                <input type="checkbox" id="<?php echo $position?>">
                                <label for="<?php echo $position?>"><?php echo $position?></label>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <textarea name="message" id="message" placeholder="Write your message"></textarea>
                    <button class="btn ">Submit</button>
                </div>
            </fieldset>
        </form>

    </div>
</section>