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
        <img src="static/logo.png" alt="School Logo">
    </div>
    <div style="margin-left: 20px;">
       <h1>Presentation de DZ School</h1>
        <p>Nous sommes DZ School, une école d'enseignement algérienne par excellence. Notre but est de former les cadres du demain, nous accompagnons nos étudiants depuis leur jeune âge jusqu'à arriver a 18 ans, en leur offrant toutes les commodités dont nous disposons pour leur offrir la meilleur expérience d'enseignement qui puisse exister.</p>
        <p>Nous sommes composés de Mr.Sam DZ qui est le président de l'école, et plus de 200 enseignants spécialisés dans chaque matières commençant par le primaire jusqu’en arriver vers le secondaire. Nous comptons plus de 1200 étudiants réparties en ces trois niveaux d’enseignement.</p>
        <p>
            <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
        </p>
    </div>
</div>

 <?php
    require_once ("Controller/MainController.php");
    MainController::PagePresentationController();

 ?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
