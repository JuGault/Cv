<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de Batman</title>
    <link rel="stylesheet" href="CSS/style.css">
    <meta name="author" content="Julien Gault">
</head>

<body>
<?=
    include 'php/navbar.php';
?>
<?=
    include 'php/header.php';
?>

    <main>
        <section id="competences">
            <div class="titres">
                <h2>Compétences</h2>
            </div>
            <ul>
                <li>
                    <p class="comp_nom">Discretion</p>
                    <p class="comp_description">Grâce à mes nombreuses missions d'infiltration de nuit dans les quartiers difficiles de Gotham, j'ai acquis une discretion quasi surnaturelle me permettant de prendre les malfrats sur le fait.</p>
                </li>
                <li>
                    <p class="comp_nom">Investigation</p>
                    <p class="comp_description">N'ayant pas usurpé le titre de plus grand détective du monde, je suis à même de déjouer les plans machiavéliques de n'importe quel adversaire, même les plus fourbes.</p>
                </li>
                <li>
                    <p class="comp_nom">Justice</p>
                    <p class="comp_description">Par l'alliance de mes capacités physiques hors-normes et de mes bat-gadgets fabriqués maison, les bandits n'échappent plus au joug sacré de la justice des hommes.</p>
                </li>
            </ul>
        </section>



        <section id="projets">
            <div class="titres">
                <h2 id="xp">Expérience</h2>
            </div>
            <h3 id="arrestations">Arrestations</h3>
            <ul>
                <li>
                    <p class="exp_nom">Le Joker</p>
                    <p class="exp_description">Arrêté le 09/10/2019</p>
                    <p class="exp_description">Il fait sûrement ses blagues en cellule, maintenant.</p>
                <li>
                    <p class="exp_nom">Le Pingouin</p>
                    <p class="exp_description">Arrêté le 22/09/2014</p>
                    <p class="exp_description">Ce Pingouin-là ne vient pas de la banquise, mais j'ai quand même fini par le mettre au frais.</p>
                </li>
                <li>
                    <p class="exp_nom">L'Homme-Mystère</p>
                    <p class="exp_description">Arrêté le 25/04/2019</p>
                    <p class="exp_description">Le vrai mystère, c'est de savoir comment il a réussi à rester en liberté si longtemps.</p>
                </li>
            </ul>
        </section>

        <section id="experiences">
            <div id="enfants">
                <div>
                    <h3>Références</h3>
                </div>
                <div id="references">
                    <a id="JL" href="https://www.instagram.com/thedcuniverse/?hl=fr" target="_blank">
                        <img src="Images/logoJL.jpg" alt="logo DC">
                    </a>

                    <a href="https://www.instagram.com/superman/" target="_blank">
                        <img src="Images/logoSM.png" alt="Superman">
                    </a>

                    <a id="ww" href="https://www.instagram.com/wonderwoman/" target="_blank">
                        <img src="Images/logoWW.png" alt="logo Wonder Woman">
                    </a>
                </div>
            </div>
            <div>
            </div>

            <div id="formation">
                <h3>Formation</h3>

                <a>
                    <img src="Images/ligueombres.jpg" alt="lique des Ombres">
                </a>
                <p>Ligue des Ombres</p>
            </div>
        </section>



        <section id="sectionmobile">
            <div class="titres">
                <h2>Mobilité</h2>
            </div>
            <div id="mobilite">
                <div class="enfants">
                    <div>
                        <h3>Périmètre d'intervention</h3>
                    </div>
                    <div id="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85640.15228716246!2d1.8421689270642467!3d47.873394653107624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e4e4d49df386e3%3A0x9eb97de479c38029!2zT3Jsw6lhbnM!5e0!3m2!1sfr!2sfr!4v1583830943819!5m2!1sfr!2sfr" width="550" height="600" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>

                <div class="enfants">
                    <div>
                        <h3>Véhicules</h3>
                    </div>
                    <div>
                        <div id="vehicules">
                            <figure>
                                <img src="Images/batmobile.jpg" alt="Batmobile">
                                <figcaption>Batmobile</figcaption>
                            </figure>

                            <figure>
                                <img src="Images/batwing.jpg" alt="Batwing">
                                <figcaption>Batwing</figcaption>
                            </figure>

                            <figure>
                                <img src="Images/batpod.jpg" alt="Batmobile">
                                <figcaption>Batpod</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section id="recommandations">
            <div class="titres">
                <h2>Recommandations</h2>
            </div>
            <div class="shilling">
                <div class="reco">
                    <img src="Images/reco_gordon.png" alt="Photo de Gordon" />
                    <div class="textreco">
                        <p>"Agent de terrain exemplaire, ne compte pas ses heures de jours comme de nuit. Sait se rendre invisible (je vous assure il est très fort). La ville de Gotham toute entière recommande !"</p>

                        <p>- Commissaire James Gordon</p>
                    </div>
                </div>
                <div class="reco">
                    <img src="Images/reco_blake.jpeg" alt="Photo de John Blake" />
                    <div class="textreco">
                        <p> "Batman a été un excellent tuteur de stage, peu pédagogue mais illustre très bien par l'exemple"</p>
                        <p>- John Blake</p>
                    </div>

                </div>
            </div>

        </section>

        <section id="contact">

            <div class="titres">
                <h2>Me contacter</h2>
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
    </main>

    <footer>
        <ul class="coordonnees">
            <li class="mail_batman"><a href="mailto:batman@gotham.cave" target="_blank"><img src="Images/signal.png" alt="Avion en papier">Batman@gotham.cave</a></li>
            <li class="tel_batman"><a href="tel:+12123548844" target="_blank"><img src="Images/signal.png" alt="Téléphone mobile">(1)212-354-8844</a></li>
        </ul>

        <ul class="footer_links">
            <li><a href="https://twitter.com/DCBatman" target="_blank"><img src="Images/twitter.svg" alt="Twitter"></a></li>
            <li><a href="https://www.linkedin.com/in/batman-🦇-b256b1168/?originalSubdomain=fr" target="_blank"><img src="Images/linkedin.svg" alt="Linkedin"></a></li>
            <li><a href="https://www.viadeo.com" target="_blank"><img src="Images/viadeo.svg" alt="Viadeo"></a></li>
        </ul>
        <p class="copyright">&copy; 2020 Wild Code School</p>
    </footer>
</body></html>
