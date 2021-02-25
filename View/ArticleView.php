<style>
    .media{
        display: flex;
        flex-direction: row;
    }
    .media img{
        width: 250px;
        border-radius: 10px;
        margin-right: 20px;
    }
    #parent-articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
    @media screen and (max-width: 800px ){
        #parent-articles {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media screen and (max-width: 640px ){
        #parent-articles {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media screen and (max-width: 460px ){
        #parent-articles {
            grid-template-columns: repeat(1, 1fr);
        }
</style>

<?php

class ArticleView
{
    public function display_article($article)
    {
        include_once ("static/html_header.php");

        $path = "static/";
        $categorie = "";

        switch ($article["cycle"]){
            case "P":
                $categorie = "Primaire";
                $path .= "img/";
                break;
            case "M":
                $categorie = "Moyen";
                $path .= "img/";
                break;
            case "S":
                $categorie = "Secondaire";
                $path .= "img/";
                break;
            case "E":
                $categorie = "Eleve";
                $path .= "students/";
                break;
            case "Pa":
                $categorie = "Parent";
                $path .= "parents/";
                break;
            default:
                $categorie = "Multi Utilisateurs";
                $path .= "parents/";
                break;
        }

        ?>
            <div class="media">
                <img src=<?=$path.$article["image_article"]?> class="card-img-top" alt="<?=$article["tittre_article"]?>">
                <div class="media-body">
                    <h5 class="card-title"><?=$article["tittre_article"]?></h5>
                    <p class="card-text"><?=$article["description_article"]?></p>
                    <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$article["data_ajout_article"]?></small></p>
                    <p class="card-text"><small class="text-muted">Catégorie Article: <?=$categorie?></small></p>
                    <a style="color: #fff;" href="index.php" class="btn btn-dark">Revenir vers la page d'accueil</a>
                </div>
            </div>
        <?php
    }

    public function display_parent_articles_view($parent_articles)
    {
        ?>
        <div id="parent-articles" class="card-group">
            <?php
            while($parent_article = $parent_articles->fetch())
            {
                ?>
                <div class="card">
                    <img src=<?="static/parents/".$parent_article["image_article"]?> class="card-img-top" alt=<?=$parent_article["tittre_article"]?>>
                    <div class="card-body">
                        <h5 class="card-title"><?=$parent_article["tittre_article"]?></h5>
                        <p class="card-text"><?=substr($parent_article["description_article"], 0, 125)."..."?></p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$parent_article["data_ajout_article"]?></small></p>
                        <p class="card-text"><small class="text-muted">Catégorie Article: Parent</small></p>
                        <a style="color: #fff;" href="routerArticle.php?id_article=<?=$parent_article['id_article']?>" class="btn btn-dark">Afficher la suite</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}