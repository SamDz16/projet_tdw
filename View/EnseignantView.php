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

    #students,
    #ens-classes{
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap: 40px;
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

    public function display_gestion_ajout_notes_eleves_form($ens_classes)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Gestion des notes par <?= $_SESSION["ens_firstname"] . " " . $_SESSION["ens_lastname"]?> - Ajout</h3>
            <div id="ens-classes" style="padding: 10px;">
                <?php
                while($ens_classe  = $ens_classes->fetch()){
                    ?>
                    <div>
                        <form method="post" action="enseignantLoginMaster.php" enctype="multipart/form-data">
                            <h5>Classe: <?=$ens_classe["nom_classe"]?></h5>
                            <?php
                            require_once ("Model/StudentModel.php");
                            $student_model = new StudentModel();
                            $class_students = $student_model->fetchStudentsByClasse((int) $ens_classe["id_classe"]);
                            ?>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="gestion_id_eleve">Veuillez sélectionner l'élève:</label>
                                    <select id="gestion_id_eleve" name="ajout_gestion_id_eleve" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_student = $class_students->fetch()){
                                            ?>
                                            <option value=<?= (int) $class_student["id_eleve"]?>><?="Nom élève: ". $class_student["nom_eleve"] . " - ". "Prenom élève: ". $class_student["prenom_eleve"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <?php
                                    require_once ("Model/ClasseModel.php");
                                    $class_model = new ClasseModel();
                                    $class_matieres = $class_model->fetchEnseignantClassNatieres((int) $ens_classe["id_classe"], $_SESSION["ens_id"]);
                                    ?>
                                    <label for="gestion_matiere_eleve">Veuillez sélectionner la matière:</label>
                                    <select id="gestion_matiere_eleve" name="ajout_gestion_nom_matiere" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_matiere = $class_matieres->fetch()){
                                            ?>
                                            <option value=<?= $class_matiere["nom_matiere"]?>><?="Nom Matière: ". $class_matiere["nom_matiere"] . " - ". "Cycle Matière: ". $class_matiere["nom_cycle"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="class_student">Veuillez entrer la note de cet élève:</label>
                                    <input name="ajout_gestion_note_eleve" type="text" class="form-control" id="class_student" aria-describedby="textHelp">
                                </div>
                            </div>

                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Ajouter Note</button>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    public function display_gestion_delete_notes_eleves_form($ens_classes)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Gestion des notes par <?= $_SESSION["ens_firstname"] . " " . $_SESSION["ens_lastname"]?> - Suppression</h3>
            <div id="ens-classes" style="padding: 10px;">
                <?php
                while($ens_classe  = $ens_classes->fetch()){
                    ?>
                    <div>
                        <form method="post" action="enseignantLoginMaster.php" enctype="multipart/form-data">
                            <h5>Classe: <?=$ens_classe["nom_classe"]?></h5>
                            <?php
                            require_once ("Model/StudentModel.php");
                            $student_model = new StudentModel();
                            $class_students = $student_model->fetchStudentsByClasse((int) $ens_classe["id_classe"]);
                            ?>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="gestion_supp_id_eleve">Veuillez sélectionner l'élève:</label>
                                    <select id="gestion_supp_id_eleve" name="supprimer_gestion_id_eleve" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_student = $class_students->fetch()){
                                            ?>
                                            <option value=<?= (int) $class_student["id_eleve"]?>><?="Nom élève: ". $class_student["nom_eleve"] . " - ". "Prenom élève: ". $class_student["prenom_eleve"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <?php
                                    require_once ("Model/ClasseModel.php");
                                    $class_model = new ClasseModel();
                                    $class_matieres = $class_model->fetchEnseignantClassNatieres((int) $ens_classe["id_classe"], $_SESSION["ens_id"]);
                                    ?>
                                    <label for="gestion_supp__matiere_eleve">Veuillez sélectionner la matière:</label>
                                    <select id="gestion_supp__matiere_eleve" name="supprimer_gestion_nom_matiere" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_matiere = $class_matieres->fetch()){
                                            ?>
                                            <option value=<?= $class_matiere["nom_matiere"]?>><?="Nom Matière: ". $class_matiere["nom_matiere"] . " - ". "Cycle Matière: ". $class_matiere["nom_cycle"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
<!--                                <div class="form-group col">-->
<!--                                    <label for="class_student">Veuillez entrer la note de cet élève:</label>-->
<!--                                    <input name="ajout_gestion_note_eleve" type="text" class="form-control" id="class_student" aria-describedby="textHelp">-->
<!--                                </div>-->
                            </div>

                            <button style="margin-top: 20px;" type="submit" class="btn btn-danger">Supprimer Note</button>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    public function display_gestion_modify_notes_eleves_form($ens_classes)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Gestion des notes par <?= $_SESSION["ens_firstname"] . " " . $_SESSION["ens_lastname"]?> - Modification</h3>
            <div id="ens-classes" style="padding: 10px;">
                <?php
                while($ens_classe  = $ens_classes->fetch()){
                    ?>
                    <div>
                        <form method="post" action="enseignantLoginMaster.php" enctype="multipart/form-data">
                            <h5>Classe: <?=$ens_classe["nom_classe"]?></h5>
                            <?php
                            require_once ("Model/StudentModel.php");
                            $student_model = new StudentModel();
                            $class_students = $student_model->fetchStudentsByClasse((int) $ens_classe["id_classe"]);
                            ?>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="gestion_modif_id_eleve">Veuillez sélectionner l'élève:</label>
                                    <select id="gestion_modif_id_eleve" name="modifier_gestion_id_eleve" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_student = $class_students->fetch()){
                                            ?>
                                            <option value=<?= (int) $class_student["id_eleve"]?>><?="Nom élève: ". $class_student["nom_eleve"] . " - ". "Prenom élève: ". $class_student["prenom_eleve"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <?php
                                    require_once ("Model/ClasseModel.php");
                                    $class_model = new ClasseModel();
                                    $class_matieres = $class_model->fetchEnseignantClassNatieres((int) $ens_classe["id_classe"], $_SESSION["ens_id"]);
                                    ?>
                                    <label for="gestion_modif_matiere_eleve">Veuillez sélectionner la matière:</label>
                                    <select id="gestion_modif_matiere_eleve" name="modifier_gestion_nom_matiere" class="form-select" aria-label="Default select example">
                                        <?php
                                        while($class_matiere = $class_matieres->fetch()){
                                            ?>
                                            <option value=<?= $class_matiere["nom_matiere"]?>><?="Nom Matière: ". $class_matiere["nom_matiere"] . " - ". "Cycle Matière: ". $class_matiere["nom_cycle"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="estion_modif_note_eleve">Veuillez entrer la note de cet élève:</label>
                                    <input name="modifier_gestion_note_eleve" type="text" class="form-control" id="estion_modif_note_eleve" aria-describedby="textHelp">
                                </div>
                            </div>

                            <button style="margin-top: 20px;" type="submit" class="btn btn-danger">Modifier Note</button>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }


}