<style>
    #primary-articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
</style>

<?php

class PrimaryMainContentView
{
    public function display_primary_main_content($primary_articles)
    {
        ?>
            <div id="primary-articles" class="card-group">
                <?php
                    while($primary_article = $primary_articles->fetch())
                    {
                        ?>
                            <div class="card">
                                <img src=<?="static/img/".$primary_article["image_article"]?> class="card-img-top" alt=<?=$primary_article["tittre_article"]?>>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$primary_article["tittre_article"]?></h5>
                                    <p class="card-text"><?=substr($primary_article["description_article"], 0, 120)."..."?></p>
                                    <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$primary_article["data_ajout_article"]?></small></p>
                                    <p class="card-text"><small class="text-muted">Cycle: <?=$primary_article["cycle"]?></small></p>
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