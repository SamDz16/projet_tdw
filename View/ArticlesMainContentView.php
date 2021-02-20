<style>
    #articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
    @media screen and (max-width: 800px ){
        #articles {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media screen and (max-width: 640px ){
        #articles {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media screen and (max-width: 460px ){
        #articles {
            grid-template-columns: repeat(1, 1fr);
        }
</style>

<?php

class ArticlesMainContentView
{
    public function     display_articles_main_content($articles)
    {
        ?>
            <div style="margin: 20px 0;" id="articles" class="card-group">
                <?php
                    while($article = $articles->fetch())
                    {
                        if($article["cycle"] == "P"){
                            $categorie = "Primaire";
                        } else if($article["cycle"] == "M"){
                            $categorie = "Moyen";
                        } else {
                            $categorie = "Secondaire";
                        }
                        ?>
                            <div class="card">
                                <img src=<?="static/img/".$article["image_article"]?> class="card-img-top" alt=<?=$article["tittre_article"]?>>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$article["tittre_article"]?></h5>
                                    <p class="card-text"><?=substr($article["description_article"], 0, 120)."..."?></p>
                                    <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$article["data_ajout_article"]?></small></p>
                                    <p class="card-text"><small class="text-muted">Catégorie Article: <?=$categorie?></small></p>
                                    <a style="color: #fff;" href="routerArticle.php?id_article=<?=$article['id_article']?>" class="btn btn-dark">Afficher la suite</a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        <?php
    }
}