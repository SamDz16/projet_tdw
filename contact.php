<?php


//include_once("static/html_header.php");
include_once("./static/html_header.php");
//include_once("./Controller/MainController.php");

require_once("Controller/MainController.php");
// Instantiate the super controller
$main_controller = new MainController();

// Invoke sub controllers
$main_controller->HeaderController();
?>

<!-- Contenu -->
<div id="presentation_ecole">
    <div>
        <img src="static/cotact.jpg" style="width: 400px; margin-top: 20px;" alt="School Logo">
    </div>
    <div style="margin-left: 20px;">
        <h1>Contactez nous!</h1>
        <p>Avez-vous des questions? Vous êtes encore indécis? Nous vous invitons chaleureusement à nous présenter vers notre siège, qui se situe à : 03 Rue Ali Belaid, El Biar, Alger. Ou bien de nous contacter par téléphone: 0552457837 / 0771451274, Fax: 0217211111. Ou bien de nous contactez vers nos réseau sociaux:</p>
        <p style="text-align: center;">
            <a style="color: #000; margin: 0 20px;" href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a style="color: #000; margin: 0 20px;" href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a style="color: #000; margin: 0 20px;" href="#"><i class="fa fa-youtube fa-2x"></i></a>
            <a style="color: #000; margin: 0 20px;" href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </p>
        <p>
            <a class="btn btn-primary" href="index.php">Revenir à la page d'accueil</a>
        </p>
    </div>
</div>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
