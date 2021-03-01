<?php
include_once("./static/html_header.php");
?>

<?php
require_once ("Controller/MainController.php");
$main_controller = new MainController();
$main_controller->HeaderController();
?>

<?php
    require_once ("View/PresentationEcoleView.php");
    $presentaion_ecole_view = new PresentationEcoleView();

    require_once ("Model/PresentationModel.php");
    $presentaion = new PresentationModel();
    $presentation_articles = $presentaion->fetchPresentationData();

    $presentaion_ecole_view->display_presentation_ecole_articles($presentation_articles);
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
