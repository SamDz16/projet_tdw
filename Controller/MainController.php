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
        require_once("Model/AdminLoginModel.php");
        $admin_login = new AdminLoginModel();

        require_once("View/AdminView.php");
        $admin_view = new AdminView();

//        session_start();

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
        } else $admin_view->display_admin_view();
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
        require_once ("Model/PrimaryModel.php");
        $primary_model = new PrimaryModel();

        $primary_articles = $primary_model->fetchPrimaryArticles();

        require_once ("View/PrimaryMainContentView.php");
        $primary_main_content_view = new PrimaryMainContentView();
        $primary_main_content_view->display_primary_main_content($primary_articles);
    }
}