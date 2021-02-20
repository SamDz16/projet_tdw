<style>
    #pagination{
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }
</style>

<?php

class PaginationView
{
    public function display_pagination($old_articles)
    {
        ?>
        <div>
            <h5 style="text-align: center; margin: 20px 0 0 0;">Liste des articles les plus anciens:</h5>
            <nav id="pagination" aria-label="...">
                <ul class="pagination">
                    <?php
                    $i = 1;
                    while($article  = $old_articles->fetch()){
                        ?>
                        <li class="page-item"><a class="page-link" href="routerArticle.php?id_article=<?=$article["id_article"]?>"><?=$i?></a></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <?php
    }
}