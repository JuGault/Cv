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

    $data = [];
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $key => $value) {
            $data[$key] = trim($value);
        }

        if (empty($data['Name'])){
            $errors['Name'] = 'The name is empty';
        }
        if (255 < strlen($data['Name'])) {
            $errors['Name'] = 'This name is too long';
        }
        if ( 255 < strlen($data['Company'])) {
            $errors['Company'] = 'This name of company is too long';
        }
        if (empty($data['email'])){
            $errors['email'] = 'The Mail Address is empty';
        }
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'This Mail format is invalid';
        }
        if (empty($data['phone'])){
            $errors['phone'] = 'The Phone number is empty';
        }

    }





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

        <form action="" method="post" id="formulaire_mail">
            <fieldset>
                <div class="input-group">
                    <input value="<?= $data['Name'] ?? '' ?>" type="text" placeholder="Enter your Name" id="name" name="Name">
                        <div class="errors"><?= $errors['Name'] ?? '' ?></div>
                    <input value="<?= $data['Company'] ?? '' ?>" type="text" placeholder="Company " id="Company" name="Company">
                        <div class="errors"><?= $errors['Company'] ?? '' ?></div>
                    <input value="<?= $data['email'] ?? '' ?>" type="email" placeholder="Enter Your Email address " id="email" name="email">
                        <div class="errors"><?= $errors['email'] ?? '' ?></div>
                    <input value="<?= $data['phone'] ?? '' ?>" type="text" placeholder="Enter your phone Number" id="phonenumber" name="phone">
                    <div class="errors"><?= $errors['phone'] ?? '' ?></div>
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