<?php

include_once("./public/header.php");
//include_once("./Controller/MainController.php");

require_once("./Controller/MainController.php");

$main_controller = new MainController();


$main_controller->display_header();
$main_controller->display_caroussel();
$main_controller->display_menu();
$main_controller->display_menu_with_no_style();


include_once("./public/footer.php");