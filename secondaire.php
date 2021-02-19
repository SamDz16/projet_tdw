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
        <img src="static/img/img_2.jpg" style="width: 400px; margin-top: 20px;" alt="School Logo">
    </div>
    <div style="margin-left: 20px;">
        <h1>Presentation du cycle Secondaire</h1>
        <p>Félicitation encore, il ne reste que cette dernière phase avant l'Université, êtes vous prêts?</p>
        <p>Le Baccalauréat est sans doute une étape très importante dans la vie de chaque étudiant, car elle détermine sa prochaine profession et tracera son futur. C’est pourquoi chez DZ School, nous donnons une très grande importance à cette année en particuliers, et pour démarche, nous recrutons les meilleurs enseignants les plus expérimentés du territoire national,  nous donnons à nos étudiants la chance de tester leurs compétences avant de passer l’examen en leurs communiquons des sujets d’exercices similaires, des astuces et des méthodologies pratiques.</p>
        <p>
            <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
        </p>
    </div>
</div>

<?php
require_once("Controller/MainController.php");
$main_controller->SecondaryMainContentController();
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
