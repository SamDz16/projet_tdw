<?php

if(isset($_GET["id_article"])){
    require_once ("Controller/MainController.php");
    $main_controller = new MainController();
    $main_controller->ArticlePageController($_GET["id_article"]);
}