<style>
    #images{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
    #images .img{
        width: 450px;
    }
</style>
<?php

class MainController
{
    public function HeaderController()
    {
        require_once("View/HeaderView.php");
        $header_view = new HeaderView();
        $header_view->display_header();
    }

    public function AdminController()
    {
        require_once("View/AdminView.php");
        $admin_view = new AdminView();
        $admin_view->display_admin_login();
    }

    public function CarousselController()
    {
        require_once("View/CarousselView.php");
        $caroussel_view = new CarousselView();
        $caroussel_view->display_caroussel();
    }

    public function PrincipalMenuController()
    {
        require_once("View/PrincipalMenuView.php");
        $principal_menu_view = new PrincipalMenuView();
        $principal_menu_view->display_principal_menu();
    }

    public function FooterMenuController()
    {
       require_once("View/FooterMenuView.php");
       $footer_menu = new FooterMenuView();
       $footer_menu->display_footer_menu();
    }

    public static function AdminLoginController()
    {
        require_once ("MainController.php");
        $main_controller = new self();
        $main_controller->HeaderController();

        require_once("Model/AdminLoginModel.php");
        $admin_login = new AdminLoginModel();

        require_once("View/AdminView.php");
        $admin_view = new AdminView();

        if(!isset($_SESSION["admin_username"])){
            if(isset($_POST["admin_username"]) && isset($_POST["admin_password"])){
                $admin = $_POST["admin_username"];
                $passwd = $_POST["admin_password"];

//                Invoquer le model pour recuperation des donnees
                $res = $admin_login->admin_login();
                if($res){
                    if($admin == $res["username_admin"] && $passwd == $res["password_admin"]){
                        $_SESSION["admin_username"] = $admin;
                        $_SESSION["admin_password"] = $passwd;

                        $admin_view->display_admin_view();
                    } else echo "Wrong username or password!";
                }
            } else echo "You must enter username and password to access this page!";
        } else {
            $admin_view->display_admin_view();
        }
        $main_controller->FooterMenuController();
    }

    public static function upload_presentation()
    {
        require_once ("Model/PresentationModel.php");
        $upload_presentation = new PresentationModel();

        if(isset($_SESSION["admin_username"])){ // Must be authenticated!
            if (isset($_POST["presentation_ecole"])){
//                if(!empty($_FILES["image"]["name"])){
                    $presentation_text = $_POST["presentation_ecole"];
                    $presentation_image = $_POST["image"];

//                    $fileName = basename($_FILES["image"]["name"]);
//                    $image = $_FILES['image']['tmp_name'];
//                    $imgContent = addslashes(file_get_contents($image));

//                    echo print_r($_FILES);

                    $upload_presentation->upload_presentation($presentation_text, $presentation_image);
//                }
            } else {
                echo "Nothing is submitted!";
            }
        } else {
            echo "Admin not authenticated!";
        }
    }

    public static function PagePresentationController()
    {
        require_once ("Model/PresentationModel.php");
        $presentaion = new PresentationModel();

        $res = $presentaion->fetchPresentationData();

        ?>
        <div id="images">
            <?php
            while($pres = $res->fetch()){

                echo "<img class='img' src=static/img/".$pres["presentation_image"]." alt='Une image'>";
               ?>
                <h4><?= $pres["presentation_text"] ?></h4>
            <?php
                }
            ?>
        </div>
        <?php
    }

    public function MainContentController()
    {
        require_once ("Model/ArticleModel.php");
        $article_model = new ArticleModel();

        $articles = $article_model->fetchArticles();

        require_once ("View/MainContentIndexView.php");
        $main_content_index_view = new MainContentIndexView();
        $main_content_index_view->display_index_main_content($articles);
    }

    public function PrimaryMainContentController()
    {
        require_once("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/EDTModel.php");
        $edtmodel = new EDTModel();

        require_once ("Model/ArticleModel.php");
        $primary_model = new ArticleModel();

        require_once ("Model/EnseignantModel.php");
        $ens_model = new EnseignantModel();

        $edts = $edtmodel->fetchEDTs("Primaire");
        $enseignants = $ens_model->fetchEnseignants();

        $primary_articles = $primary_model->fetchCycleArticles("P");

        $main_controller->HeaderController();

        require_once ("View/CycleArticlesView.php");
        $cycle_articles_view = new CycleArticlesView();
        $cycle_articles_view->display_static_primaire();
        $cycle_articles_view->display4articles("Primaire", $edts, $enseignants);

        require_once ("View/ArticlesMainContentView.php");
        $primary_main_content_view = new ArticlesMainContentView();
        $primary_main_content_view->display_articles_main_content($primary_articles);

        $main_controller->FooterMenuController();
    }

    public function ArticlePageController($id_article)
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("Model/ArticleModel.php");
        $article_model = new ArticleModel();
        $article = $article_model->fetchArticle($id_article)->fetch();

        require_once ("View/ArticleView.php");
        $article_view = new ArticleView();
        $article_view->display_article($article);

        $main_controller->FooterMenuController();
    }

    public function MoyenMainContentController()
    {
        require_once("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/EDTModel.php");
        $edtmodel = new EDTModel();

        require_once ("Model/ArticleModel.php");
        $moyen_model = new ArticleModel();

        require_once ("Model/EnseignantModel.php");
        $ens_model = new EnseignantModel();

        $edts = $edtmodel->fetchEDTs("Moyen");
        $enseignants = $ens_model->fetchEnseignants();

        $moyen_articles = $moyen_model->fetchCycleArticles("M");

        $main_controller->HeaderController();

        require_once ("View/CycleArticlesView.php");
        $cycle_articles_view = new CycleArticlesView();
        $cycle_articles_view->display_static_moyen();
        $cycle_articles_view->display4articles("Moyen", $edts, $enseignants);

        require_once ("View/ArticlesMainContentView.php");
        $moyen_main_content_view = new ArticlesMainContentView();
        $moyen_main_content_view->display_articles_main_content($moyen_articles);

        $main_controller->FooterMenuController();
    }

    public function SecondaryMainContentController()
    {
        require_once("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/EDTModel.php");
        $edtmodel = new EDTModel();

        require_once ("Model/ArticleModel.php");
        $secondary_model = new ArticleModel();

        require_once ("Model/EnseignantModel.php");
        $ens_model = new EnseignantModel();

        $edts = $edtmodel->fetchEDTs("Moyen");
        $enseignants = $ens_model->fetchEnseignants();

        $secondary_articles = $secondary_model->fetchCycleArticles("S");

        $main_controller->HeaderController();

        require_once ("View/CycleArticlesView.php");
        $cycle_articles_view = new CycleArticlesView();
        $cycle_articles_view->display_static_secondaire();
        $cycle_articles_view->display4articles("Secondary", $edts, $enseignants);

        require_once ("View/ArticlesMainContentView.php");
        $secondary_main_content_view = new ArticlesMainContentView();
        $secondary_main_content_view->display_articles_main_content($secondary_articles);

        $main_controller->FooterMenuController();
    }

    public function StudentController()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("Model/ArticleModel.php");
        $student_articles = new ArticleModel();
        $student_articles = $student_articles->fetchCycleArticles("E");

        require_once("View/StudentLoginView.php");
        require_once("View/StudentArticlesView.php");

        $student_login_view = new StudentLoginView();
        $student_view = new StudentArticlesView();

        $student_login_view->display_student_login_view();
        $student_view->display_student_articles_view($student_articles);

        $main_controller->FooterMenuController();
    }

    public function ParentController()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("Model/ArticleModel.php");
        $parent_articles = new ArticleModel();
        $parent_articles = $parent_articles->fetchCycleArticles("Pa");

        require_once("View/ArticleView.php");
        $parent_articles_view = new ArticleView();

        require_once ("View/ParentView.php");
        $parent_view = new ParentView();
        $parent_view->display_parent_login_view();

        $parent_articles_view->display_parent_articles_view($parent_articles);

        $main_controller->FooterMenuController();

    }

    public static function StudentLoginController()
    {
        require_once ("View/HeaderView.php");
        $main_controller = new self();
        $main_controller->HeaderController();

        require_once ("View/StudentLoginView.php");

        require_once ("View/StudentArticlesView.php");
        $student_articles_view = new StudentArticlesView();

        require_once ("View/StudentDetailsView.php");
        $student_details_view = new StudentDetailsView();

        require_once ("Model/ArticleModel.php");
        $student_articles = new ArticleModel();

        require_once ("Model/StudentModel.php");
        $student_model = new StudentModel();

        if(!isset($_SESSION["student_firstname"])){

            $student_lastname = $_POST["student_lastname"];
            $student_firstname = $_POST["student_firstname"];

            $student = $student_model->fetchStudent($student_firstname, $student_lastname)->fetch();

            if($student){
                // Means student exists in database
                $_SESSION["student_firstname"] = $student["prenom_eleve"];
                $_SESSION["student_lastname"] = $student["nom_eleve"];

                $student_details = $student_model->fetchStudentDetails($student["prenom_eleve"], $student["nom_eleve"])->fetch();
                $student_activities = $student_model->fetchStudentActivities($student["prenom_eleve"], $student["nom_eleve"]);
                $student_articles = $student_articles->fetchCycleArticles("E");

                $student_details_view->display_student_details($student_details, $student_activities);
                $student_articles_view->display_student_articles_view($student_articles);
            }
            else {
                echo "Cet étudiant n'existe pas dans cette école";
            }
        }else {
            $student_details = $student_model->fetchStudentDetails($_SESSION["student_firstname"], $_SESSION["student_lastname"])->fetch();
            $student_activities = $student_model->fetchStudentActivities($_SESSION["student_firstname"], $_SESSION["student_lastname"]);
            $student_articles = $student_articles->fetchCycleArticles("E");

            $student_details_view->display_student_details($student_details, $student_activities);
            $student_articles_view->display_student_articles_view($student_articles);
        }
        $main_controller->FooterMenuController();
    }

    public static function parentLoginController()
    {
        require_once ("View/HeaderView.php");
        $main_controller = new self();
        $main_controller->HeaderController();

        require_once ("View/ArticleView.php");
        $parent_articles_view = new ArticleView();


        require_once ("Model/ParentModel.php");
        $parent_model = new ParentModel();

        require_once ("View/ParentView.php");
        $parent_view = new ParentView();

        if(!isset($_SESSION["parent_firstname"])){

            $parent_lastname = $_POST["parent_lastname"];
            $parent_firstname = $_POST["parent_firstname"];

            $parent = $parent_model->fetchParent($parent_firstname, $parent_lastname)->fetch();

            if($parent){
                // Means parent exists in database
                $_SESSION["parent_firstname"] = $parent["prenom_parent"];
                $_SESSION["parent_lastname"] = $parent["nom_parent"];
                $_SESSION["parent_id"] = $parent["id_parent"];

                $parent_sons = $parent_model->fetchParentSons($parent["id_parent"]);
                $parent_sons_notes = $parent_model->fetchNotes($parent["id_parent"]);
                $parent_sons_remarques_ens = $parent_model->fetchRemarquesEnseignant($parent["id_parent"]);
                $parent_sons_activities = $parent_model->fetchActivities($parent["id_parent"]);

                $parent_view->display_parent_sons_detail($parent_sons, $parent_sons_notes, $parent_sons_remarques_ens, $parent_sons_activities);

            }
            else {
                echo "Ce parent n'a aucun éleve dans cette école";
            }
        }else {
            $parent_sons = $parent_model->fetchParentSons($_SESSION["parent_id"]);
            $parent_sons_notes = $parent_model->fetchNotes($_SESSION["parent_id"]);
            $parent_sons_remarques_ens = $parent_model->fetchRemarquesEnseignant($_SESSION["parent_id"]);
            $parent_sons_activities = $parent_model->fetchActivities($_SESSION["parent_id"]);

            $parent_view->display_parent_sons_detail($parent_sons, $parent_sons_notes, $parent_sons_remarques_ens, $parent_sons_activities);

        }
        $main_controller->FooterMenuController();
    }

    public function EDTsPageController($edts)
    {
        echo "List des emplois du temps";

        echo "<pre>";
            print_r($edts->fetch());
        echo "</pre>";
    }

    public function ContactController()
    {
        require_once ("View/ContactView.php");
        $contact_view = new ContactView();
        $contact_view->display_contact_page();
    }

    public function PaginationController()
    {
        require_once ("Model/ArticleModel.php");
        $article_model = new ArticleModel();

        require_once ("View/PaginationView.php");
        $pagination_view = new PaginationView();

        $old_articles = $article_model->fetchOldArticles();

        $pagination_view->display_pagination($old_articles);
    }
}