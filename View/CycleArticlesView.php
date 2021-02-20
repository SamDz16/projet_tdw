<style>
    #articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
</style>
<?php

class CycleArticlesView
{
    public function display4articles($cycle, $edts, $enseignants)
    {

        ?>
        <div style="margin: 20px 0;" id="articles" class="card-group">
            <div class="card">
                <img  src="static/img/schedule.jpg" class="card-img-top" alt="schedule">
                <div class="card-body">
                    <h5 class="card-title">Emplois du temps du cycle: <?=$cycle?></h5>
                    <p class="card-text"><small class="text-muted">Cliquez ci-dessous pour accéder à la liste des emplois du temps de cycle <?=$cycle?></small></p>
<!--                    <a style="color: #fff;" href="routerArticle.php?edts=--><?//=$edts?><!--" class="btn btn-dark">Afficher la suite</a>-->
                </div>
            </div>

            <div class="card">
                <img src="static/img/teacher.jpg" class="card-img-top" alt="schedule">
                <div class="card-body">
                    <h5 class="card-title">Liste des enseignats: </h5>
                    <?php
                    while($ens = $enseignants->fetch()){
                        ?>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Enseignant: <b><?=$ens["nom_enseignant"];?> <?=$ens["prenom_enseignant"];?></b></small></p>
                        <p style="margin-top: 0;" class="card-text"><small class="text-muted">Heure de reception: <?=$ens["heure_reception_enseignant"];?></small></p>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="card">
                <img src="static/img/infos.jpg" class="card-img-top" alt="schedule">
                <div class="card-body">
                    <h5 class="card-title">Informations pratiques</h5>
                    <p class="card-text"><small class="text-muted">Informations pratiques</small></p>
                    <a style="color: #fff;" href="info.php" class="btn btn-dark">Afficher la suite</a>
                </div>
            </div>

            <div class="card">
                <img src="static/img/restauration.jpg" class="card-img-top" alt="schedule">
                <div class="card-body">
                    <h5 class="card-title">Restauration</h5>
                    <p class="card-text"><small class="text-muted">Informations sur la restauration</small></p>
                    <a style="color: #fff;" href="restauration.php" class="btn btn-dark">Afficher la suite</a>
                </div>
            </div>
        </div>
        <?php
    }

}