<style>
    #index-main-content{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
</style>

<?php

class MainContentIndexView
{
    public function display_index_main_content($articles)
    {
        ?>
            <div id="index-main-content" class="card-group">
                <?php
                    while($article = $articles->fetch())
                    {
                        ?>
                            <div class="card">
                                <img src=<?="static/img/".$article["image_article"]?> class="card-img-top" alt=<?=$article["tittre_article"]?>>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$article["tittre_article"]?></h5>
                                    <p class="card-text"><?=substr($article["description_article"], 0, 120)."..."?></p>
                                    <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$article["data_ajout_article"]?></small></p>
                                    <p class="card-text"><small class="text-muted">Cycle: <?=$article["cycle"]?></small></p>
                                    <a style="color: #fff;" href="#" class="btn btn-dark">Afficher la suite</a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        <?php
    }
}