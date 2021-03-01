<?php
include_once("./static/html_header.php");
?>

<?php
require_once ("Controller/MainController.php");
$main_controller = new MainController();
$main_controller->HeaderController();
?>

<?php
if(isset($_GET["cycle"])){
    require_once("Model/EDTModel.php");
    $edt_model = new EDTModel();
    $cycle_id_edts = $edt_model->fetchCycleEDTs($_GET["cycle"]);

    require_once ("View/GestionAdmin.php");
    $gestion_model = new GestionAdmin();
    $gestion_model->display_edt_info($cycle_id_edts);
}
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
