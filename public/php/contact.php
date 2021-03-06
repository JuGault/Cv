<section id="contact">
    <?php


    $query = "SELECT * FROM infoPerso";
    $statement = $pdo->query($query);
    $infoPerso = $statement->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM forWitchPosition";
    $statement = $pdo->query($query);
    $forwhitchPosition = $statement->fetchAll(PDO::FETCH_ASSOC);


    $data = [];
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $key => $value) {
            $data[$key] = trim($value);
        }

        if (empty($data['Name'])) {
            $errors['Name'] = 'The name is empty';
        }
        if (255 > strlen($data['Name'])) {
            $errors['Name'] = 'This name is too long';
        }
        if (255 > strlen($data['Company'])) {
            $errors['Company'] = 'This name of company is too long';
        }
        if (empty($data['email'])) {
            $errors['email'] = 'The Mail Address is empty';
        }
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'This Mail format is invalid';
        }
        if (empty($data['phone'])) {
            $errors['phone'] = 'The Phone number is empty';
        }
        if (empty($errors)) {
            $congratulation = 'Merci ' . htmlentities($data['Name']) . ' votre message a bien été envoyé je vous recontacte au plus vite.';
        }

    }


    ?>
    <div class="titres">
        <span></span>
        <h2>Contact me</h2><span></span>
    </div>
    <?php if (!empty($congratulation)) : ?>
        <div class="congratulation"><?= $congratulation ?></div><?php endif; ?>
    <div class="contact">
        <div class="contact-info">
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=2.704406976699829%2C48.011745451766316%2C2.717850208282471%2C48.01817596352136&amp;layer=mapnik"
                    style="border: 1px solid black"></iframe>

            <div class="general-info">
                <?php foreach ($infoPerso as $info) : ?>
                    <div class="Info-perso">
                    <img src="<?php echo $info['icon'] ?>" alt="icone-<?php echo $info['nameinfo'] ?>">
                    <p style="font-weight: 900; text-decoration: underline; "><?php echo $info['nameinfo'] ?> :</p>
                    <p><?php echo $info['info'] ?></p>
                    </div><?php endforeach; ?>
            </div>
        </div>

        <form action="" method="post" id="formulaire_mail">
            <fieldset>
                <div class="input-group">
                    <label for="Name"></label>
                    <input value="<?= $data['Name'] ?? '' ?>" type="text" placeholder="Enter your Name" id="name"
                           name="Name">
                    <div class="errors"><?= $errors['Name'] ?? '' ?></div>
                    <label for="Company"></label>
                    <input value="<?= $data['Company'] ?? '' ?>" type="text" placeholder="Company " id="Company"
                           name="Company">
                    <div class="errors"><?= $errors['Company'] ?? '' ?></div>
                    <label for="email"></label>
                    <input value="<?= $data['email'] ?? '' ?>" type="email" placeholder="Enter Your Email address "
                           id="email" name="email">
                    <div class="errors"><?= $errors['email'] ?? '' ?></div>
                    <label for="phone"></label>
                    <input id="phone" name="phone" placeholder="Enter your phone Number"
                           type="tel" value="<?= $data['phone'] ?? '' ?>">
                    <div class="errors"><?= $errors['phone'] ?? '' ?></div>
                </div>


                <div class="area-group">
                    <div class="Check-group">
                        <?php foreach ($forwhitchPosition as $position) : ?>
                            <div class="single-check">
                                <input type="checkbox" id="<?php echo $position['name'] ?>">
                                <label for="<?php echo $position['name'] ?>"><?php echo $position['name'] ?></label>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <label for="message"></label>
                    <textarea name="message" id="message" placeholder="Write your message"></textarea>
                    <button class="btn ">Submit</button>
                </div>
            </fieldset>
        </form>

    </div>
</section>