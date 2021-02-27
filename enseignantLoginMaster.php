<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
    require_once ("Model/NoteModel.php");
    $note_model = new NoteModel();

    if(isset($_POST["ajout_gestion_id_eleve"])){
        $note_model->addNoteEleveMatiere($_POST["ajout_gestion_id_eleve"], $_POST["ajout_gestion_nom_matiere"], (float) $_POST["ajout_gestion_note_eleve"]);
    }
    else if(isset($_POST["supprimer_gestion_id_eleve"])){
        $note_model->deleteNoteEleveMatiere($_POST["supprimer_gestion_id_eleve"], $_POST["supprimer_gestion_nom_matiere"]);
    }
    if(isset($_POST["modifier_gestion_id_eleve"])){
        $note_model->modifyNoteEleveMatiere($_POST["modifier_gestion_id_eleve"], $_POST["modifier_gestion_nom_matiere"], (float) $_POST["modifier_gestion_note_eleve"]);
    }
?>

<?php
require_once("Controller/MainController.php");
if (isset($_POST["nom_ens"]) || isset($_SESSION["ens_firstname"])) {
    MainController::EnseignantLoginController();
} else {
    echo "Enseignant is not authenticated!";
}
?>

<?php
include_once("static/html_footer.php");
?>
