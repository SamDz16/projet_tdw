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

class StudentArticlesView
{
    public function display_notes_info($student_notes)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Liste de vos notes: </h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Élève</th>
                    <th scope="col">Prenom Élève</th>
                    <th scope="col">e-Mail</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Cycle</th>
                    <th scope="col">EDT</th>
                    <th scope="col">Matière</th>
                    <th scope="col">Note</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $i = 1;
                    while($student_note = $student_notes->fetch()){
                    ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student_note["nom_eleve"]?></td>
                    <td><?=$student_note["prenom_eleve"]?></td>
                    <td><?=$student_note["email_eleve"]?></td>
                    <td><?=$student_note["nom_classe"]?></td>
                    <td><?=$student_note["nom_cycle"]?></td>
                    <td><?=$student_note["id_EDT"]?></td>
                    <td><?=$student_note["nom_matiere"]?></td>
                    <td><?=$student_note["note"]?></td>
                </tr>
                <?php
                ++$i;
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    public function display_student_articles_view($student_articles)
    {
        ?>
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