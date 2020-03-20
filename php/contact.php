<section id="contact">

    <div class="titres">
        <h2><span></span>Me contacter<span></span></h2>
    </div>
    <div class="contact">
        <form action="test.php" method="POST" id="formulaire_mail">
            <fieldset class="formulaire_mail">
                <legend>M'envoyer un message</legend>
                <label for="email">Mail</label>
                <input type="email" id="email" name="email" placeholder="@" required>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="50" rows="10" required></textarea>
                <button class="button" type="submit" form="formulaire_mail"></button>
            </fieldset>
        </form>
        <form action="test.php" method="POST" id="formulaire_tel">
            <fieldset class="formulaire_tel">
                <legend>Je vous rappelle</legend>
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
                <label for="tel">Téléphone</label>
                <input type="tel" id="tel" name="tel" minlength="10" placeholder="06" required>
                <label for="date">Date</label>
                <input type="date" id="date" name="date">
                <label class="time_label" for="time">Entre 8:00 et 20:00</label>
                <div class="time"><input type="time" id="time" min="08:00" max="20:00"></div>
                <button class="button" type="submit" form="formulaire_tel"></button>
            </fieldset>
        </form>
    </div>
</section>