<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php

    if(isset($_GET["gestion"]) && isset($_SESSION["admin_username"])){
        if($_SESSION["admin_username"] === "admin"){
            // L'admin doit etre authentifie!

            require_once ("Controller/MainController.php");
            $main_controller = new MainController();

            switch ($_GET["gestion"]){
                case "article":
                    $main_controller->GestionArticleController();
                    break;

                case "presentation_ecole":
                    $main_controller->GestionPresentationEcole();
                    break;

                case "emploi_du_temps":

                case "enseignant":
                    $main_controller->GestionEnseignant();
                    break;

                case "utilisateur":

                case "restauration":

                case "contact":

                case "diaporama":

                default:
                    echo "Operation non permise!";
                    break;
            }
        } else {
            echo "Admin n'est pas authentifié!";
        }
    }
?>


<?php
include_once("static/html_footer.php");
?>