<?php
include_once("./static/html_header.php");
?>

 <?php
    require_once ("Controller/MainController.php");
    MainController::PagePresentationController();
 ?>

<?php
include_once("static/html_footer.php");
?>
