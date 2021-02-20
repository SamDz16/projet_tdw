<?php

class ArticleView
{
    public function display_article($article)
    {
        include_once ("static/html_header.php");

        if($article["cycle"] === "P"){
            $categorie = "Primaire";
        } else if($article["cycle"] === "M"){
            $categorie = "Moyen";
        } else {
            $categorie = "Secondaire";
        }

        $path = "static/img/";
        if ((int)$article["id_article"] >= 12) $path = "static/students/";
        ?>
        <div id="article-details" class="card">
            <img src=<?=$path.$article["image_article"]?> class="card-img-top" alt=<?=$article["tittre_article"]?>>
            <div class="card-body">
                <h5 class="card-title"><?=$article["tittre_article"]?></h5>
                <p class="card-text"><?=$article["description_article"]?></p>
                <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$article["data_ajout_article"]?></small></p>
                <p class="card-text"><small class="text-muted">Catégorie Article: <?=$categorie?></small></p>
                <a style="color: #fff;" href="index.php" class="btn btn-dark">Revenir vers la page d'accueil</a>
            </div>
        </div>
        <?php
        include_once ("static/html_footer.php");
    }
}