<style>
    #articles{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;
    }
    #presentation_ecole img{
        border-radius: 10px;
    }
</style>
<?php

class CycleArticlesView
{
    public function display_static_primaire()
    {
        ?>
        <!-- Contenu -->
        <div id="presentation_ecole">
            <div>
                <img style="width: 400px; margin-top: 20px;" src="static/img/img_1.jpg" alt="School Logo">
            </div>
            <div style="margin-left: 20px;">
                <h1>Presentation du cycle primaire</h1>
                <p>Chez DZ School, nous donnons trop d’importances à nos chers élèves en particulier ceux du cycle primaire, car nous croyons que cette étape est fondamentale dans le cursus de l'élève en ayant la base dans tous les modules ce qui va lui serait d’une très grande importance lors de la suite de son cursus universitaire.</p>
                <p>Le jeune élève va avoir cinq (5) années qui se dérouleront comme suit:
                <ol>
                    <li>Les deux premières années, l'élève va comprendre les bases mathématiques et linguistiques</li>
                    <li>La troisième et la quatrième année, l'élève va approfondir sur les modules précédents, mais va aussi apprendre quelque notions en physique et quelque séances de sports supplémentaires</li>
                    <li>A la fin de la cinquième année, l'étudiant est appelé à passer un examen national "Cinquième" qui va lui permettre d'accéder au cycle supérieur</li>
                </ol>
                </p>
                <p>
                    <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
                </p>
            </div>
        </div>
            <?php
    }

    public function display_static_moyen()
    {
        ?>
        <!-- Contenu -->
        <div id="presentation_ecole">
            <div>
                <img src="static/img/img_3.jpg" style="width: 400px; margin-top: 20px;" alt="School Logo">
            </div>
            <div style="margin-left: 20px;">
                <h1>Presentation du cycle Moyen</h1>
                <p>Félicitation pour ton "Cinquième" !</p>
                <p>Durant cette phase qui va s'étaler sur quatre années, nous offrons à nos élèves une révisions de ce qu’ils ont pris déjà et nous solidifier leurs connaissance avec des notions techniques un peu avancées qui vont leur permettre de passer le “BEM” a la fin de leur cursus de cycle moyen.</p>
                <p>
                    <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
                </p>
            </div>
        </div>
        <?php
    }

    public function display_static_secondaire()
    {
        ?>
        <!-- Contenu -->
        <div id="presentation_ecole">
            <div>
                <img src="static/img/img_2.jpg" style="width: 400px; margin-top: 20px;" alt="School Logo">
            </div>
            <div style="margin-left: 20px;">
                <h1>Presentation du cycle Secondaire</h1>
                <p>Félicitation encore, il ne reste que cette dernière phase avant l'Université, êtes vous prêts?</p>
                <p>Le Baccalauréat est sans doute une étape très importante dans la vie de chaque étudiant, car elle détermine sa prochaine profession et tracera son futur. C’est pourquoi chez DZ School, nous donnons une très grande importance à cette année en particuliers, et pour démarche, nous recrutons les meilleurs enseignants les plus expérimentés du territoire national,  nous donnons à nos étudiants la chance de tester leurs compétences avant de passer l’examen en leurs communiquons des sujets d’exercices similaires, des astuces et des méthodologies pratiques.</p>
                <p>
                    <a class="btn btn-primary btn-outline" href="index.php">Revenir à la page d'accueil</a>
                </p>
            </div>
        </div>
        <?php
    }

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