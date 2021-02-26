<?php session_start(); ?>

<?php
    include_once("static/html_header.php");

    require_once ("Model/ArticleModel.php");
    $article_model = new ArticleModel();

    require_once ("Model/PresentationModel.php");
    $presentation_model = new PresentationModel();

    require_once ("Model/EnseignantModel.php");
    $enseignant_model = new EnseignantModel();

    require_once ("Model/AdminLoginModel.php");
    $admin_model = new AdminLoginModel();

    require_once ("Model/StudentModel.php");
    $student_model = new StudentModel();
?>

<?php
    if(isset($_POST["titre_article"])){
        $users = "";
        foreach($_POST["checklist_users"] as $checklist_user){
            $users .= " " . $checklist_user;
        }
        $article_model->addArticle($_POST["titre_article"], $_POST["image_article"],$_POST["description_article"],$users);
    }
    else if (isset($_POST["delete_article"])) {
        $article_model->deleteArticle((int) $_POST["delete_article"]);
    }
    else if(isset($_POST["modify_article"])){
        $users = "";
        foreach($_POST["checklist_users"] as $checklist_user){
            $users .= " " . $checklist_user;
        }
        $article_model->modifyArticle($_POST["modify_article"], $_POST["titre_article_modify"], $_POST["image_article_modify"],$_POST["description_article_modify"],$users);
    }
    else if(isset($_POST["titre_presentation_ecole"])){

        $presentation_model->upload_presentation($_POST["titre_presentation_ecole"], $_POST["text_presentation_ecole"], $_POST["image_presentation"]);
    }
    else if(isset($_POST["delete_presentation"])){

        $presentation_model->deletePresentation($_POST["delete_presentation"]);
    }
    else if(isset($_POST["modify_presentation"])){

        $presentation_model->modifyPresentation($_POST["modify_presentation"], $_POST["modify_titre_presentation"], $_POST["modify_text_presentation"], $_POST["modify_image_presentation"]);
    }
    else if(isset($_POST["ajouter_nom_ens"])){

        $enseignant_model->add_enseignant($_POST["ajouter_nom_ens"], $_POST["prenom_ens"], $_POST["jour_reception"]." ".$_POST["heure_reception"]);
    }
    else if(isset($_POST["supprimer_ens"])){

        $enseignant_model->delete_enseignant($_POST["supprimer_ens"]);
    }
    else if(isset($_POST["modifier_ens"])){

        $enseignant_model->modify_enseignant($_POST["modifier_ens"], $_POST["modifier_nom_ens"], $_POST["modifier_prenom_ens"], $_POST["modifier_jour_reception"]." ".$_POST["modifier_heure_reception"]);
    }
    else if(isset($_POST["ens"])){

        $enseignant_model->add_ens_classe_heure_travail($_POST["ens"], $_POST["classe"], $_POST["heure_travail"]);
    }
    else if(isset($_POST["modify_admin"])){

        $admin_model->modifyAdmin($_POST["modify_admin_username"], $_POST["modify_admin_password"]);
    }
    else if(isset($_POST["ajouter_nom_eleve"])){

        $student_model->addStudent($_POST["ajouter_nom_eleve"],$_POST["ajouter_prenom_eleve"],$_POST["ajouter_adresse_eleve"],$_POST["ajouter_email_eleve"],$_POST["ajouter_photo_eleve"],$_POST["ajouter_dob_eleve"],$_POST["ajouter_annee_eleve"],$_POST["ajouter_classe_eleve"],$_POST["ajouter_parent_eleve"]);
    }
    else if(isset($_POST["supprimer_eleve"])){

        $student_model->deleteStudent($_POST["supprimer_eleve"]);
    }
    else if(isset($_POST["modifier_nom_eleve"])){

        $student_model->modifyStudent($_POST["modifier_eleve"], $_POST["modifier_nom_eleve"],$_POST["modifier_prenom_eleve"],$_POST["modifier_adresse_eleve"],$_POST["modifier_email_eleve"],$_POST["modifier_photo_eleve"],$_POST["modifier_dob_eleve"],$_POST["modifier_annee_eleve"],$_POST["modifier_classe_eleve"],$_POST["modifier_parent_eleve"]);
    }
?>

<?php
    require_once("Controller/MainController.php");
    if (isset($_POST["admin_username"]) || isset($_SESSION["admin_username"])) {
        MainController::AdminLoginController();
    } else {
        echo "Admin is not authenticated!";
    }


//    if (isset($_POST["titre_presentation_ecole"]) || isset($_POST["image"])) {
//        MainController::upload_presentation();
//    }
?>

<?php
    include_once("static/html_footer.php");
?>
