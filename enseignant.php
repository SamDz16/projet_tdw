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
    require_once("Model/EnseignantModel.php");
    $ens_model = new EnseignantModel();
    $cycle_ens_ids = $ens_model->fetchEnseignantsCycle($_GET["cycle"]);

//    while($r = $cycle_ens_ids->fetch()){
//        echo "<pre>";
//        print_r($r);
//        echo "</pre>";
//    }


    while($cycle_ens_id = $cycle_ens_ids->fetch()){
        require_once ("View/EnseignantView.php");
        $ens_view = new EnseignantView();

        $ens_details = $ens_model->fetchTeacherById((int) $cycle_ens_id["id_enseignant"])->fetch();

//        print_r($ens_details);

        $ens_matieres = $ens_model->fetchEnseignantMatieres((int) $cycle_ens_id["id_enseignant"]);

//        while($r = $ens_matieres->fetch()){
//            echo "<pre>";
//            print_r($r);
//            echo "</pre>";
//        }

        $ens_view->display_ens_cycle_details($ens_details, $ens_matieres);
    }
}
?>

<?php
$main_controller->FooterMenuController();
?>

<?php
include_once("static/html_footer.php");
?>
