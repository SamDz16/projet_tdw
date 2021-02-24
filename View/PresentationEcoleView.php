<style>
    /*#articles{*/
    /*    display: grid;*/
    /*    grid-template-columns: repeat(2,1fr);*/
    /*    grid-gap: 10px;*/
    /*}*/
    .media{
        display: flex;
        flex-direction: row;
        margin: 20px 0;
    }

    #articles img{
        width: 250px;
        margin-right: 20px;
        border-radius: 5px;
    }

</style>
<?php

class PresentationEcoleView
{
    public function display_static_presentation_ecole()
    {
        ?>
        <!-- Contenu -->
        <div id="presentation_ecole">
            <div>
                <img src="static/logo.png" alt="School Logo">
            </div>
            <div style="margin-left: 20px;">
                <h1>Presentation de DZ School</h1>
                <p>Nous sommes DZ School, une école d'enseignement algérienne par excellence. Notre but est de former les cadres du demain, nous accompagnons nos étudiants depuis leur jeune âge jusqu'à arriver a 18 ans, en leur offrant toutes les commodités dont nous disposons pour leur offrir la meilleur expérience d'enseignement qui puisse exister.</p>
                <p>Nous sommes composés de Mr.Sam DZ qui est le président de l'école, et plus de 200 enseignants spécialisés dans chaque matières commençant par le primaire jusqu’en arriver vers le secondaire. Nous comptons plus de 1200 étudiants réparties en ces trois niveaux d’enseignement.</p>
                <p>
                    <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
                </p>
            </div>
        </div>
        <?php
    }

    public function display_presentation_ecole_articles($presentation_articles)
    {
        ?>
        <div style="margin: 20px 0;" id="articles" class="card-group">
            <?php
            while($presentation_article = $presentation_articles->fetch())
            {
                ?>
                <div class="media">
                    <img src=<?="static/img/".$presentation_article["image_presentation"]?> class="card-img-top" alt=<?=$presentation_article["titre_presentation"]?>>
                    <div class="media-body">
                        <h5 class="card-title"><?=$presentation_article["titre_presentation"]?></h5>
                        <p class="card-text"><?=$presentation_article["text_presentation"]?></p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$presentation_article["date_ajout_presentation"]?></small></p>
                        <p class="card-text"><small class="text-muted">Catégorie Article: Présentation Ecole</small></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}