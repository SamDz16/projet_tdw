<?php
include_once("./static/html_header.php");
?>

<?php
require_once ("Controller/MainController.php");
$main_controller = new MainController();
$main_controller->HeaderController();
?>

<?php
    require_once("Model/RestaurationModel.php");
    $restauration_model = new RestaurationModel();

    require_once("View/RestaurationView.php");
    $restauration_view = new RestaurationView();

    $dishes = $restauration_model->fetchDishes();
    $restauration_view->display_restauration_menu($dishes);
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
