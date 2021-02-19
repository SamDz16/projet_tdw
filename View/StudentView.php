<style>
    #student-articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
    @media screen and (max-width: 800px ){
        #student-articles {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media screen and (max-width: 640px ){
        #student-articles {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media screen and (max-width: 460px ){
        #student-articles {
            grid-template-columns: repeat(1, 1fr);
        }
</style>
<?php

class StudentView
{
    public function display_student_view($student_articles)
    {
        ?>
            <div style="border: 2px solid #5cb85c; border-radius: 10px; padding: 10px; margin: 20px 0;">
                <form style="padding: 15px;" method="post" action="userRouter.php" enctype="multipart/form-data">
                    <div style="margin: 20px 0;" class="form-group">
                        <label style="margin-bottom: 5px;" for="exampleInputText1">Nom d'utilisateur:</label>
                        <input name="student_username" type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                        <small id="emailHelp" class="form-text text-muted">Vos données vont rester secret
                        </small>
                    </div>
                    <div style="margin: 20px 0;" class="form-group">
                        <label style="margin-bottom: 5px;" for="exampleInputPassword1">Mot de passe:</label>
                        <input name="student_password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-success">S'authentifier</button>
                    <a style="color: #fff;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
                </form>
            </div>
            <div id="student-articles" class="card-group">
                <?php
                while($student_article = $student_articles->fetch())
                {
                    ?>
                    <div class="card">
                        <img src=<?="static/students/".$student_article["image_article"]?> class="card-img-top" alt=<?=$student_article["tittre_article"]?>>
                        <div class="card-body">
                            <h5 class="card-title"><?=$student_article["tittre_article"]?></h5>
                            <p class="card-text"><?=substr($student_article["description_article"], 0, 120)."..."?></p>
                            <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$student_article["data_ajout_article"]?></small></p>
                            <p class="card-text"><small class="text-muted">Catégorie Article: Élèves</small></p>
                            <a style="color: #fff;" href="routerArticle.php?id_article=<?=$student_article['id_article']?>" class="btn btn-dark">Afficher la suite</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php
    }
}