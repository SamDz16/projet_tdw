<?php session_start(); ?>

<?php
    include_once("static/html_header.php");
?>

<?php
    require_once("Controller/MainController.php");
    if (isset($_POST["admin_username"]) || isset($_SESSION["admin_username"])) {
        MainController::AdminLoginController();
    }
    if (isset($_POST["presentation_ecole"]) || isset($_POST["image"])) {
        MainController::upload_presentation();
    }
    else {
        echo "You are in LoginMaster.php page";
    }
?>

<?php
    include_once("static/html_footer.php");
?>
