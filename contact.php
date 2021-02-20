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

<?php
require_once ("Controller/MainController.php");
$main_controller = new MainController();
$main_controller->ContactController();
?>


<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
