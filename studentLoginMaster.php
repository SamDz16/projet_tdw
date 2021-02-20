<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
    require_once("Controller/MainController.php");
    if (isset($_POST["student_lastname"]) || isset($_SESSION["student_firstname"])) {
        MainController::StudentLoginController();
    }
//    if (isset($_POST["presentation_ecole"]) || isset($_POST["image"])) {
//        MainController::upload_presentation();
//    }
    else {
        echo "Student is not authenticated!";
    }
?>

<?php
include_once("static/html_footer.php");
?>
