<?php session_start(); ?>
<?php

if(isset($_GET["userIs"])){
    if ($_GET["userIs"] === "eleve"){
        unset($_SESSION["student_id"], $_SESSION["student_firstname"], $_SESSION["student_lastname"]);
        header("Location: http://". $_SERVER['HTTP_HOST']. "/PROJECT_TDW/index.php");

    }else if ($_GET["userIs"] === "admin"){
        unset($_SESSION["admin_username"], $_SESSION["admin_password"]);
        header("Location: http://". $_SERVER['HTTP_HOST']. "/PROJECT_TDW/index.php");

    }else if ($_GET["userIs"] === "parent"){
        unset($_SESSION["parent_firstname"], $_SESSION["parent_lastname"], $_SESSION["parent_id"]);
        header("Location: http://". $_SERVER['HTTP_HOST']. "/PROJECT_TDW/index.php");
    }else if ($_GET["userIs"] === "enseignant") {
        unset($_SESSION["ens_firstname"], $_SESSION["ens_lastname"], $_SESSION["ens_id"]);
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PROJECT_TDW/index.php");
    }else {
        echo "Action non permise!";
    }
}
