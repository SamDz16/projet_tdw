<?php
include_once("./static/html_header.php");
?>

<?php
require_once("Controller/MainController.php");
$main_controller = new MainController();
$main_controller->PrimaryMainContentController();
?>

<?php
include_once("static/html_footer.php");
?>
