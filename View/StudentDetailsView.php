<style>
    #st-details{
        display: flex;
        flex-direction: row;
        margin-bottom: 30px;
    }
    #st-details img{
        border-radius: 10px;
    }
</style>
<?php


class StudentDetailsView
{
    public function display_student_details($student_details, $student_activities)
    {
        ?>
        <div>
            <h3 style="margin-bottom: 20px;">Informations sur <?=$student_details["nom_eleve"]?> <?=$student_details["prenom_eleve"]?></h3>
            <div style="margin-bottom: 20px;" id="st-details" class="media">
                <img style="width: 250px; margin-right: 20px;" src="static/students/<?=$student_details["photo_eleve"]?>" class="mr-3" alt=<?=$student_details["nom_eleve"]?>>
                <div class="media-body">
                    <h5 class="mt-0"><b><?=$student_details["nom_eleve"]. " ". $student_details["prenom_eleve"]?></b></h5>
                    <p>Vous êtes étudiant chez DZ School</p>
                    <p><small class="text-muted">Date de naissance: <?=$student_details["date_naissance_eleve"]?></small></p>
                    <p><small class="text-muted">Année: <?=$student_details["annee_eleve"]?></small></p>
                    <p><small class="text-muted">Classe: <?=$student_details["nom_classe"]?></small></p>
                    <p><small class="text-muted">EDT: <?=$student_details["id_edt"]?></small></p>
                </div>
                <div style="margin: 0 20px;">
                    <h5>Les activités extra scolaire qui y sont lié :</h5>
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Activités extra scolaire
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            while($student_activity = $student_activities->fetch()){
                                ?>
                                <li class="list-group-item"><?=$student_activity["nom_activite"]?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <a style="color: #fff; margin: 0 0 20px 0;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
<!--            <a style="color: #fff; margin: 0 0 20px 0;" href="index.php" class="btn btn-secondary">Deconnexion</a>-->
        </div>
        <?php
    }
}