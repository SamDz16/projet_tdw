<?php

class MainController
{
    public function HeaderController()
    {
        require_once("View/HeaderView.php");
        $header_view = new HeaderView();

        require_once ("Model/AdminLoginModel.php");
        $admin_model = new AdminLoginModel();
        $admin = $admin_model->admin_login();
        $header_view->display_header($admin);
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

               // Invoquer le model pour recuperation des donnees
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

        if(isset($_SESSION["admin_username"])){
            // Must be authenticated!
            if (isset($_POST["titre_presentation_ecole"])){

                $titre_presentation_text = $_POST["titre_presentation_ecole"];
                if(isset($_POST["text_presentation_ecole"])){
                    $text_presentation_text = $_POST["text_presentation_ecole"];
                }
                if(isset($_POST["image"])){
                    $presentation_image = $_POST["image"];
                }

                $upload_presentation->upload_presentation($titre_presentation_text, $text_presentation_text, $presentation_image);
            } else {
                echo "Nothing is submitted!";
            }
        } else {
            echo "Admin not authenticated!";
        }
    }

    public static function PagePresentationController()
    {
        require_once("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/PresentationModel.php");
        $presentaion = new PresentationModel();

        $main_controller->HeaderController();

        $presentation_articles = $presentaion->fetchPresentationData();

        require_once ("View/PresentationEcoleView.php");
        $presentaion_ecole_view = new PresentationEcoleView();

        $presentaion_ecole_view->display_static_presentation_ecole();
        $presentaion_ecole_view->display_presentation_ecole_articles($presentation_articles);

        $main_controller->FooterMenuController();
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

    public function EnseignantController()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("Model/ArticleModel.php");
        $article_model = new ArticleModel();
        $ens_articles = $article_model->fetchCycleArticles("Ens");

        require_once ("View/EnseignantView.php");
        $ens_view = new EnseignantView();
        $ens_view->display_ens_login_view();

        $ens_view->display_ens_articles_view($ens_articles);

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
                $_SESSION["student_id"] = $student["id_eleve"];
                $_SESSION["student_firstname"] = $student["prenom_eleve"];
                $_SESSION["student_lastname"] = $student["nom_eleve"];

                $student_details = $student_model->fetchStudentDetails($student["prenom_eleve"], $student["nom_eleve"])->fetch();
                $student_activities = $student_model->fetchStudentActivities($student["prenom_eleve"], $student["nom_eleve"]);
                $student_articles = $student_articles->fetchCycleArticles("E");

                $student_details_view->display_student_details($student_details, $student_activities);

                $student_notes = $student_model->fetchStudentNotes($_SESSION["student_id"]);
                $student_articles_view->display_notes_info($student_notes);

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

            $student_notes = $student_model->fetchStudentNotes($_SESSION["student_id"]);
            $student_articles_view->display_notes_info($student_notes);

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

                $parent_sons = $parent_model->fetchParentSons($_SESSION["parent_id"]);
                $parent_view->display_parent_sons_detail($parent_sons);

                $parent_sons = $parent_model->fetchParentSons($_SESSION["parent_id"]);
                $parent_view->display_notes_info($parent_sons);

            }
            else {
                echo "Ce parent n'a aucun éleve dans cette école";
            }
        }else {
            $parent_sons = $parent_model->fetchParentSons($_SESSION["parent_id"]);
            $parent_view->display_parent_sons_detail($parent_sons);

            $parent_sons = $parent_model->fetchParentSons($_SESSION["parent_id"]);
            $parent_view->display_notes_info($parent_sons);
        }
        $main_controller->FooterMenuController();
    }

    public static function EnseignantLoginController()
    {
        require_once ("View/HeaderView.php");
        $main_controller = new self();
        $main_controller->HeaderController();

        require_once ("Model/EnseignantModel.php");
        $ens_model = new EnseignantModel();

        require_once ("View/EnseignantView.php");
        $ens_view = new EnseignantView();

        if(!isset($_SESSION["ens_firstname"])){

            $ens_lastname = $_POST["nom_ens"];
            $ens_firstname = $_POST["prenom_ens"];

            $ens = $ens_model->fetchTeacher($ens_lastname, $ens_firstname)->fetch();

            if($ens){
                // Means teacher exists in database
                $_SESSION["ens_id"] = $ens["id_enseignant"];
                $_SESSION["ens_firstname"] = $ens["prenom_enseignant"];
                $_SESSION["ens_lastname"] = $ens["nom_enseignant"];

                $ens_details = $ens_model->fetchTeacherById($_SESSION["ens_id"])->fetch();
                $ens_matieres = $ens_model->fetchEnseignantMatieres($_SESSION["ens_id"]);
                $ens_view->display_ens_details($ens_details, $ens_matieres);

                $results = $ens_model->fetchStudentsOfTeacher($_SESSION["ens_id"]);
                $ens_view->display_student_details($results);

                $results = $ens_model->fetchEnseignantEleveNotes($_SESSION["ens_id"]);
                $ens_view->display_notes_info($results);

                $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
                $ens_view->display_gestion_ajout_notes_eleves_form($ens_classes);

                $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
                $ens_view->display_gestion_delete_notes_eleves_form($ens_classes);

                $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
                $ens_view->display_gestion_modify_notes_eleves_form($ens_classes);

            }
            else {
                echo "Cet enseignant n'est pas enregistré dans cette école";
            }
        }else {

            $ens_details = $ens_model->fetchTeacherById($_SESSION["ens_id"])->fetch();
            $ens_matieres = $ens_model->fetchEnseignantMatieres($_SESSION["ens_id"]);
            $ens_view->display_ens_details($ens_details, $ens_matieres);

            $results = $ens_model->fetchStudentsOfTeacher($_SESSION["ens_id"]);
            $ens_view->display_student_details($results);

            $results = $ens_model->fetchEnseignantEleveNotes($_SESSION["ens_id"]);
            $ens_view->display_notes_info($results);

            $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
            $ens_view->display_gestion_ajout_notes_eleves_form($ens_classes);

            $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
            $ens_view->display_gestion_delete_notes_eleves_form($ens_classes);

            $ens_classes = $ens_model->fetchEnseignantClasses($_SESSION["ens_id"]);
            $ens_view->display_gestion_modify_notes_eleves_form($ens_classes);

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
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("View/ContactView.php");
        $contact_view = new ContactView();

        require_once ("Model/ContactModel.php");
        $contact_model = new ContactModel();

        $icons = $contact_model->fetchIcons();
        $contact_details = $contact_model->fetchContactDetails();
        $contact_view->display_contact_page($contact_details, $icons);

        $main_controller->FooterMenuController();
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

    public function GestionArticleController()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/ArticleModel.php");
        $article_model = new ArticleModel();

        require_once ("View/GestionAdmin.php");
        $gestion_admin = new GestionAdmin();

        $main_controller->HeaderController();

        $gestion_admin->display_add_article_form();

        $all_articles = $article_model->fetchAllArticles();
        $gestion_admin->display_delete_article_form($all_articles);

        $all_articles = $article_model->fetchAllArticles();
        $gestion_admin->display_modify_article_form($all_articles);

        $main_controller->FooterMenuController();
    }

    public function GestionPresentationEcole()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/PresentationModel.php");
        $presentation_model = new PresentationModel();

        require_once ("View/GestionAdmin.php");
        $gestion_admin = new GestionAdmin();

        $main_controller->HeaderController();

        $gestion_admin->display_upload_presentation_form();

        $presentations = $presentation_model->fetchPresentationData();
        $gestion_admin->display_delete_presentation_form($presentations);

        $presentations = $presentation_model->fetchPresentationData();
        $gestion_admin->display_modify_presentation_form($presentations);;

        $main_controller->FooterMenuController();
    }

    public function GestionEnseignant()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/EnseignantModel.php");
        $enseignant_model = new EnseignantModel();
        require_once ("Model/ClasseModel.php");
        $classe_model = new ClasseModel();
        require_once ("Model/HeureTravailModel.php");
        $heure_travail_model = new HeureTravailModel();

        require_once ("View/GestionAdmin.php");
        $gestion_admin = new GestionAdmin();

        $main_controller->HeaderController();

        $res = $enseignant_model->fetch_enseignant_classe_heure_travail();
        $gestion_admin->display_ens_classe_heure_travail($res);

        $gestion_admin->display_add_enseignant_form();

        $enseignants = $enseignant_model->fetchEnseignants();
        $gestion_admin->display_delete_enseignant_form($enseignants);

        $enseignants = $enseignant_model->fetchEnseignants();
        $gestion_admin->display_modify_enseignant_form($enseignants);;


        $enseignants = $enseignant_model->fetchEnseignants();
        $classes = $classe_model->fetchClasses();
        $heures_travail = $heure_travail_model->fetchHeuresTravail();
        $gestion_admin->display_add_enseignant_classe_heure_form($enseignants,$classes,$heures_travail);

        $main_controller->FooterMenuController();
    }

    public function GestionUtilisateurs()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        require_once ("Model/AdminLoginModel.php");
        $admin_model = new AdminLoginModel();

        require_once ("Model/ClasseModel.php");
        $classe_model = new ClasseModel();

        require_once ("Model/ParentModel.php");
        $parent_model = new ParentModel();

        require_once ("Model/StudentModel.php");
        $student_model = new StudentModel();

        require_once ("View/GestionAdmin.php");
        $gestion_admin = new GestionAdmin();

        $main_controller->HeaderController();

        // Gestion Admin
        $admins = $admin_model->fetchAdmins();
        $gestion_admin->display_modify_admin_form($admins);

        $classes = $classe_model->fetchClasses();
        $parents = $parent_model->fetchParents();
        $gestion_admin->display_add_eleve_form($classes,$parents);

        $students = $student_model->fetchStudents();
        $gestion_admin->display_delete_eleve_form($students);

        $students = $student_model->fetchStudents();
        $classes = $classe_model->fetchClasses();
        $parents = $parent_model->fetchParents();
        $gestion_admin->display_modify_eleve_form($students,$classes,$parents);

        $gestion_admin->display_add_parent_form();

        $parents = $parent_model->fetchParents();
        $gestion_admin->display_delete_parent_form($parents);

        $parents = $parent_model->fetchParents();
        $gestion_admin->display_modify_parent_form($parents);

        $main_controller->FooterMenuController();
    }

    public function GestionRestauration()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        require_once ("View/RestaurationView.php");
        $restauration_view = new RestaurationView();

        require_once ("Model/RestaurationModel.php");
        $restauration_model = new RestaurationModel();

        $main_controller->HeaderController();

        $dishes = $restauration_model->fetchDishes();
        $restauration_view->display_restauration_menu($dishes);

        $restauration_view->display_ajouter_restauration_form();

        $restauration_view->display_delete_restauration_form();

        $restauration_view->display_modify_restauration_form();

        $main_controller->FooterMenuController();
    }

    public function GestionContact()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("View/ContactView.php");
        $contact_view = new ContactView();

        require_once ("Model/ContactModel.php");
        $contact_model = new ContactModel();

        $contact_view->display_add_contact_form();

        $contacts = $contact_model->fetchContactDetails();
        $contact_view->display_delete_contact_form($contacts);

        $contacts = $contact_model->fetchContactDetails();
        $contact_view->display_modify_contact_form($contacts);

        $main_controller->FooterMenuController();
    }

    public function GestionEDT()
    {
        require_once ("Controller/MainController.php");
        $main_controller = new self();

        $main_controller->HeaderController();

        require_once ("Model/EDTModel.php");
        $edt_model = new EDTModel();

        require_once ("Model/ClasseModel.php");
        $classe_model = new ClasseModel();

        require_once ("View/GestionAdmin.php");
        $edt_view = new GestionAdmin();

        $id_edts = $edt_model->fetchIdEDTs();
        $edt_view->display_edt_info($id_edts);

        $classes = $classe_model->fetchClasses();
        $edt_view->display_add_emploi_du_temps_form($classes);

        $main_controller->FooterMenuController();
    }
}