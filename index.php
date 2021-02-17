<?php

include_once("static/html_header.php");
//include_once("./Controller/MainController.php");

require_once("Controller/MainController.php");

// Instantiate the super controller
$main_controller = new MainController();

// Invoke sub controllers
$main_controller->HeaderController();
$main_controller->CarousselController();
$main_controller->PrincipalMenuController();
$main_controller->AdminController();
$main_controller->MainContentController();
$main_controller->FooterMenuController();

include_once("static/html_footer.php");