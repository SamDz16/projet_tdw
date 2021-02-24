<?php session_start(); ?>

<?php
    include_once("static/html_header.php");

    require_once ("Model/ArticleModel.php");
    $article_model = new ArticleModel();

    require_once ("Model/PresentationModel.php");
    $presentation_model = new PresentationModel();
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
//        if ($_POST["image_presentation"] === "") $image = "";
        $presentation_model->upload_presentation($_POST["titre_presentation_ecole"], $_POST["text_presentation_ecole"], $_POST["image_presentation"]);
    }
    else if(isset($_POST["delete_presentation"])){

        $presentation_model->deletePresentation($_POST["delete_presentation"]);
    }
    else if(isset($_POST["modify_presentation"])){


        $presentation_model->modifyPresentation($_POST["modify_presentation"], $_POST["modify_titre_presentation"], $_POST["modify_text_presentation"], $_POST["modify_image_presentation"]);
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
