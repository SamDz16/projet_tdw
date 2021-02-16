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
        <img style="width: 400px; margin-top: 20px;" src="static/img/img_1.jpg" alt="School Logo">
    </div>
    <div style="margin-left: 20px;">
        <h1>Presentation du cycle primaire</h1>
        <p>Chez DZ School, nous donnons trop d’importances à nos chers élèves en particulier ceux du cycle primaire, car nous croyons que cette étape est fondamentale dans le cursus de l'élève en ayant la base dans tous les modules ce qui va lui serait d’une très grande importance lors de la suite de son cursus universitaire.</p>
        <p>Le jeune élève va avoir cinq (5) années qui se dérouleront comme suit:
            <ol>
                <li>Les deux premières années, l'élève va comprendre les bases mathématiques et linguistiques</li>
                <li>La troisième et la quatrième année, l'élève va approfondir sur les modules précédents, mais va aussi apprendre quelque notions en physique et quelque séances de sports supplémentaires</li>
                <li>A la fin de la cinquième année, l'étudiant est appelé à passer un examen national "Cinquième" qui va lui permettre d'accéder au cycle supérieur</li>
            </ol>
        </p>
        <p>
            <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
        </p>
    </div>
</div>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
