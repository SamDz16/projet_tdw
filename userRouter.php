<?php session_start(); ?>

<?php
include_once("static/html_header.php");
?>

<?php
    if(isset($_GET["userIs"])){
        require_once ("Controller/MainController.php");
        $main_controller = new MainController();
        if($_GET["userIs"] = "eleve"){
            $main_controller->StudentController();
        } elseif($_GET["userIs"] = "parent"){
            $main_controller->ParentController();
        }else {
            echo "Access denied!";
        }
    }
?>

<?php
//    if(!isset($_SESSION["student_username"]) || isset($_POST["student_username"]))
//    {
//        $student_username = $_POST["student_username"];
//        $student_password = $_POST["student_password"];
//
//        $main_controller = new MainController();
//        $main_controller->StudentLoginController($student_username, $student_password);
//
//        $SESSION["student_username"] = $student_username;
//        $SESSION["student_password"] = $student_password;
//
//    }
?>

<?php
include_once("static/html_footer.php");
?>
