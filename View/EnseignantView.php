<style>
    #ens-articles{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        grid-gap: 10px;
    }

    #ens-articles img{
        height: 200px;
    }

    #ens-details,
    #st-details{
        display: flex;
        flex-direction: row;
    }

    #ens-details img,
    #st-details img{
        border-radius: 10px;
    }

    #students{
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap: 10px;
        margin: 40px 0;
    }
</style>


<?php


class EnseignantView
{
    public function display_ens_login_view()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="margin-bottom: 0;">Espace Enseignant - Login</h3>
            <form style="padding: 15px;" method="post" action="enseignantLoginMaster.php" enctype="multipart/form-data">
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText1">Nom Enseignant:</label>
                    <input name="nom_ens" type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText2">Prénom Enseignant</label>
                    <input name="prenom_ens" type="text" class="form-control" id="exampleInputText2" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>

                <button type="submit" class="btn btn-success">S'authentifier</button>
                <a style="color: #fff;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
            </form>
        </div>
        <?php
    }

    public function display_ens_articles_view($ens_articles)
    {
        ?>
        <div id="ens-articles" class="card-group">
            <?php
            while($ens_article = $ens_articles->fetch())
            {
                ?>
                <div class="card">
                    <img src=<?="static/ens/".$ens_article["image_article"]?> class="card-img-top" alt="<?=$ens_article["tittre_article"]?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$ens_article["tittre_article"]?></h5>
                        <p class="card-text"><?=substr($ens_article["description_article"], 0, 125)."..."?></p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted"><?=$ens_article["data_ajout_article"]?></small></p>
                        <p class="card-text"><small class="text-muted">Catégorie Article: Enseignant</small></p>
                        <a style="color: #fff;" href="routerArticle.php?id_article=<?=$ens_article['id_article']?>" class="btn btn-dark">Afficher la suite</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    public function display_ens_details($ens_details, $ens_matieres)
    {
        ?>
        <div>
            <h3 style="margin-bottom: 20px;">Informations sur <?=$ens_details["nom_enseignant"]?> <?=$ens_details["prenom_enseignant"]?></h3>
            <div style="margin-bottom: 20px;" id="ens-details" class="media">
                <img style="width: 250px; margin-right: 20px;" src="static/ens/<?=$ens_details["photo_enseignant"]?>" class="mr-3" alt="<?=$ens_details["nom_enseignant"]?>">
                <div class="media-body">
                    <h5 class="mt-0"><b><?=$ens_details["nom_enseignant"]. " ". $ens_details["prenom_enseignant"]?></b></h5>
                    <p>Vous êtes ensignant chez DZ School</p>
                    <p><small class="text-muted">e-Mail: <?=$ens_details["mail_enseignant"]?></small></p>
                    <p><small class="text-muted">Tel.: <?=$ens_details["tel_enseignant"]?></small></p>
                    <p><small class="text-muted">Heure Réception: <?=$ens_details["heure_reception_enseignant"]?></small></p>
                </div>
                <div class="media-body" style="margin-left: 20px;">
                    <h5 class="mt-0">Matières enseignées par : <b><?=$ens_details["nom_enseignant"]. " ". $ens_details["prenom_enseignant"]?></b></h5>
                    <ul class="list-group">
                        <?php
                            while($ens_matiere = $ens_matieres->fetch()){
                                ?>
                                <li class="list-group-item"><?=$ens_matiere["nom_matiere"]?></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <a style="color: #fff; margin: 0 0 20px 0;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
            <a style="color: #fff; margin: 0 0 20px 0;" href="deconnexion.php?userIs=enseignant" class="btn btn-danger">Déconnexion</a>
        </div>
        <?php
    }

    public function display_student_details($student_details)
    {
        ?>
        <div id="students">
            <?php
            while($student_detail = $student_details->fetch()){
                ?>
                <div>
                    <h3 style="margin-bottom: 20px;">Informations sur <?=$student_detail["nom_eleve"]?> <?=$student_detail["prenom_eleve"]?></h3>
                    <div style="margin-bottom: 20px;" id="st-details" class="media">
                        <img style="width: 250px; margin-right: 20px;" src="static/students/<?=$student_detail["photo_eleve"]?>" class="mr-3" alt=<?=$student_detail["nom_eleve"]?>>
                        <div class="media-body">
                            <h5 class="mt-0"><b><?=$student_detail["nom_eleve"]. " ". $student_detail["prenom_eleve"]?></b></h5>
                            <p>Vous êtes étudiant chez DZ School</p>
                            <p><small class="text-muted">Date de naissance: <?=$student_detail["date_naissance_eleve"]?></small></p>
                            <p><small class="text-muted">e-Mail: <?=$student_detail["email_eleve"]?></small></p>
                            <p><small class="text-muted">Adresse: <?=$student_detail["adresse_eleve"]?></small></p>
                            <p><small class="text-muted">Année: <?=$student_detail["annee_eleve"]?></small></p>
                            <p><small class="text-muted">Classe: <?=$student_detail["nom_classe"]?></small></p>
                            <p><small class="text-muted">Cycle: <?=$student_detail["nom_cycle"]?></small></p>
                            <p><small class="text-muted">EDT: <?=$student_detail["id_EDT"]?></small></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    public function display_notes_info($student_details)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Liste des notes des étudiants associés aux matières appropriées: </h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Élève</th>
                        <th scope="col">Prenom Élève</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Cycle</th>
                        <th scope="col">EDT</th>
                        <th scope="col">Matiere</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $i = 1;
                        while($student_detail = $student_details->fetch()){
                        ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$student_detail["nom_eleve"]?></td>
                        <td><?=$student_detail["prenom_eleve"]?></td>
                        <td><?=$student_detail["nom_classe"]?></td>
                        <td><?=$student_detail["nom_cycle"]?></td>
                        <td><?=$student_detail["id_EDT"]?></td>
                        <td><?=$student_detail["nom_matiere"]?></td>
                        <td><?=$student_detail["note"]?></td>
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
}