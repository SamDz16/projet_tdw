<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
require_once("Controller/MainController.php");
if (isset($_POST["parent_lastname"]) || isset($_SESSION["parent_firstname"])) {
    MainController::ParentLoginController();
} else {
    echo "Parent is not authenticated!";
}
?>

<?php
include_once("static/html_footer.php");
?>
