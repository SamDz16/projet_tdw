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
        <img src="static/img/img_3.jpg" style="width: 400px; margin-top: 20px;" alt="School Logo">
    </div>
    <div style="margin-left: 20px;">
        <h1>Presentation du cycle Moyen</h1>
        <p>Félicitation pour ton "Cinquième" !</p>
        <p>Durant cette phase qui va s'étaler sur quatre années, nous offrons à nos élèves une révisions de ce qu’ils ont pris déjà et nous solidifier leurs connaissance avec des notions techniques un peu avancées qui vont leur permettre de passer le “BEM” a la fin de leur cursus de cycle moyen.</p>
        <p>
            <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
        </p>
    </div>
</div>

<?php
require_once("Controller/MainController.php");
$main_controller->MoyenMainContentController();
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
