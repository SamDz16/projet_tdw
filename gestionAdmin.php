<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
require_once ("Model/AdminLoginModel.php");
$admin_model = new AdminLoginModel();
$admin = $admin_model->admin_login();
?>

<?php

    if(isset($_GET["gestion"]) && isset($_SESSION["admin_username"])){
        if($_SESSION["admin_username"] === $admin["username_admin"] && $_SESSION["admin_password"] === $admin["password_admin"]){
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
                    $main_controller->GestionUtilisateurs();
                    break;

                case "restauration":
                    $main_controller->GestionRestauration();
                    break;
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