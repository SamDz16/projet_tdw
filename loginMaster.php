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
        echo "Admin is not authenticated!";
    }
?>

<?php
    include_once("static/html_footer.php");
?>
