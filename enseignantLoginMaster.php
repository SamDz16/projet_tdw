<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
require_once("Controller/MainController.php");
if (isset($_POST["nom_ens"]) || isset($_SESSION["ens_firstname"])) {
    MainController::EnseignantLoginController();
} else {
    echo "Enseignant is not authenticated!";
}
?>

<?php
include_once("static/html_footer.php");
?>
