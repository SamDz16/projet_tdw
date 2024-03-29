<style>
    #pr1-details{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5px;
    }
    #pr1-details img{
        border-radius: 10px;
    }
    #pr2-details{
        display: grid;
        grid-template-columns: 70% 30%;
        grid-gap: 20px;
    }
</style>
<?php


class ParentView
{
    public function display_parent_login_view()
    {
    ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="margin-bottom: 0;">Espace Parent - Login</h3>
            <form style="padding: 15px;" method="post" action="parentLoginMaster.php" enctype="multipart/form-data">
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText1">Nom Parent:</label>
                    <input name="parent_lastname" type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText2">Prénom Parent</label>
                    <input name="parent_firstname" type="text" class="form-control" id="exampleInputText2" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>
                <!--                    <div style="margin: 20px 0;" class="form-group">-->
                <!--                        <label style="margin-bottom: 5px;" for="exampleInputPassword1">Mot de passe:</label>-->
                <!--                        <input name="student_password" type="password" class="form-control" id="exampleInputPassword1">-->
                <!--                    </div>-->

                <button type="submit" class="btn btn-success">S'authentifier</button>
                <a style="color: #fff;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
            </form>
        </div>
    <?php
    }

    public function display_parent_sons_detail($parent_sons)
    {
        require_once ("Model/ParentModel.php");
        $parent_model = new ParentModel();
        ?>
        <div>
            <h3 style="margin-bottom: 20px;">Informations sur les enfants de <?=$_SESSION["parent_firstname"]?> <?=$_SESSION["parent_lastname"]?></h3>
            <?php

            while($parent_son = $parent_sons->fetch()){

                $parent_sons_notes = $parent_model->fetchNotes($_SESSION["parent_id"], $parent_son["id_eleve"]);
                $parent_sons_remarques_ens = $parent_model->fetchRemarquesEnseignant($_SESSION["parent_id"], $parent_son["id_eleve"]);
                $parent_sons_activities = $parent_model->fetchActivities($_SESSION["parent_id"], $parent_son["id_eleve"]);
                ?>
                <div>
                    <h5 style="margin-bottom: 20px;">Informations sur <?=$parent_son["nom_eleve"]?> <?=$parent_son["prenom_eleve"]?></h5>
                    <div style="margin: 20px 0;" id="pr1-details" class="media">
                        <img style="width: 250px;" src="static/students/<?=$parent_son["photo_eleve"]?>" class="mr-3" alt=<?=$parent_son["nom_eleve"]?>>
                        <div style="margin: 20px 0;" class="media-body">
                            <h5 class="mt-0"><b><?=$parent_son["nom_eleve"]. " ". $parent_son["prenom_eleve"]?></b></h5>
                            <p>Vous êtes étudiant chez DZ School</p>
                            <p><small class="text-muted">Date de naissance: <?=$parent_son["date_naissance_eleve"]?></small></p>
                            <p><small class="text-muted">Année: <?=$parent_son["annee_eleve"]?></small></p>
                            <p><small class="text-muted">Classe: <?=$parent_son["nom_classe"]?></small></p>
                            <p><small class="text-muted">EDT: <?=$parent_son["id_EDT"]?></small></p>
                        </div>
                        <div style="margin: 20px 10px;">
                            <h5>Les notes qui y sont lié :</h5>
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    Les Notes:
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    while($parent_sons_note = $parent_sons_notes->fetch()){
                                        ?>
                                        <li class="list-group-item">(Matiere, Note) : ( <?=$parent_sons_note["nom_matiere"]?> , <?=$parent_sons_note["note"]?> )</li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="pr2-details">
                        <div style="margin: 20px 10px;">
                            <h5>Les remarques des enseignants qui y sont lié :</h5>
                            <div class="card" style="width: 100%;">
                                <div class="card-header">
                                    Les remarques des enseignants:
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    while($parent_sons_remarque = $parent_sons_remarques_ens->fetch()){
                                        ?>
                                        <li class="list-group-item">( Enseignant ,Remarque ) :<?=" ( ". $parent_sons_remarque["nom_enseignant"]. " ".$parent_sons_remarque["prenom_enseignant"] . " : \"". $parent_sons_remarque["remarque"] ."\" )"?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div style="margin: 20px 10px;">
                            <h5>Les activités extra scolaire qui y sont lié :</h5>
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    Activités extra scolaire
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    while($parent_sons_activity = $parent_sons_activities->fetch()){
                                        ?>
                                        <li class="list-group-item"><?=$parent_sons_activity["nom_activite"]?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <a style="color: #fff; margin: 0 0 20px 0;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
        <a style="color: #fff; margin: 0 0 20px 0;" href="deconnexion.php?userIs=parent" class="btn btn-danger">Déconnexion</a>
        <!--            <a style="color: #fff; margin: 0 0 20px 0;" href="index.php" class="btn btn-secondary">Deconnexion</a>-->
        <?php
    }

    public function display_notes_info($parent_sons)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
           <?php
           require_once ("Model/ParentModel.php");
           $parent_model = new ParentModel();
           while($parent_son = $parent_sons->fetch()){
               $son_notes = $parent_model->fetchNotes($_SESSION["parent_id"], $parent_son["id_eleve"])
               ?>
                <div>
                    <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Liste des notes de : <?=$parent_son["nom_eleve"] . " " . $parent_son["prenom_eleve"]?> </h3>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom Élève</th>
                            <th scope="col">Prenom Élève</th>
                            <th scope="col">e-Mail</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Matière</th>
                            <th scope="col">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            while($son_note = $son_notes->fetch()){
                            ?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$son_note["nom_eleve"]?></td>
                            <td><?=$son_note["prenom_eleve"]?></td>
                            <td><?=$son_note["email_eleve"]?></td>
                            <td><?=$son_note["adresse_eleve"]?></td>
                            <td><?=$son_note["nom_matiere"]?></td>
                            <td><?=$son_note["note"]?></td>
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
           ?>
        </div>
        <?php
    }

}