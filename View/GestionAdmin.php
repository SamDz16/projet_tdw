<style>
    .form-group{
        margin: 10px 0;
    }
</style>
<?php


class GestionAdmin
{
    public function display_add_article_form()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter un article</h3>
            <form method="post" action="loginMaster.php">
                <div class="row">
                    <div class="col">
                        <label for="titre_presentation">Titre Article:</label>
                        <input name="titre_article" type="email" class="form-control" id="titre_presentation">
                    </div>
                    <div class="col">
                        <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                        <select id="imageSelect" name="image_article" class="form-select" aria-label="Default select example">
                            <option value="img_1.jpg" selected>Image 1</option>
                            <option value="img_2.jpg">Image 2</option>
                            <option value="img_3.jpg">Image 3</option>
                            <option value="img_4.jpg">Image 4</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text_presentation">Description Article:</label>
                    <textarea name="description_article" type="password" class="form-control" id="text_presentation" rows="6" cols="50"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <input name="checklist_users[]" value="En" class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Enseignant
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="Pa" class="form-check-input" type="checkbox" id="gridCheck2">
                        <label class="form-check-label" for="gridCheck2">
                            Parent
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="E" class="form-check-input" type="checkbox" id="gridCheck3">
                        <label class="form-check-label" for="gridCheck3">
                            Élève
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="P" class="form-check-input" type="checkbox" id="gridCheck4">
                        <label class="form-check-label" for="gridCheck4">
                            Primaire
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="M" class="form-check-input" type="checkbox" id="gridCheck5">
                        <label class="form-check-label" for="gridCheck5">
                            Moyen
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="S" class="form-check-input" type="checkbox" id="gridCheck6">
                        <label class="form-check-label" for="gridCheck6">
                            Secondaire
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="S" class="form-check-input" type="checkbox" id="gridCheck7">
                        <label class="form-check-label" for="gridCheck7">
                            Tous
                        </label>
                    </div>
                </div>

                <button style="margin: 20px 0;" type="submit" class="btn btn-success">Ajouter Article</button>
            </form>
        </div>
        <?php
    }

    public function display_delete_article_form($articles)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer un article</h3>
            <form method="post" action="loginMaster.php">
                <div class="form-group">
                    <label for="imageSelect">Veuillez sélectionner l'article à supprimer:</label>
                    <select id="imageSelect" name="delete_article" class="form-select" aria-label="Default select example">
                        <?php
                        while($article = $articles->fetch()){
                            ?>
                            <option value=<?=$article["id_article"]?>><?="ID: ". $article["id_article"] . " - Titre: ". $article["tittre_article"]?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <button style="margin: 20px 0;" type="submit" class="btn btn-danger">Supprimer Article</button>
            </form>
        </div>
        <?php
    }

    public function display_modify_article_form($articles)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier un article</h3>
            <form method="post" action="loginMaster.php">
                <div class="form-group">
                    <label for="imageSelect">Veuillez sélectionner l'article à modifier:</label>
                    <select id="imageSelect" name="modify_article" class="form-select" aria-label="Default select example">
                        <?php
                        while($article = $articles->fetch()){
                            ?>
                            <option value=<?=(int) $article["id_article"]?>><?="ID: ". (int) $article["id_article"] . " - Titre: ". $article["tittre_article"]?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="titre_presentation">Titre Article:</label>
                        <input name="titre_article_modify" type="email" class="form-control" id="titre_presentation">
                    </div>
                    <div class="col">
                        <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                        <select id="imageSelect" name="image_article_modify" class="form-select" aria-label="Default select example">
                            <option value="img_1.jpg" selected>Image 1</option>
                            <option value="img_2.jpg">Image 2</option>
                            <option value="img_3.jpg">Image 3</option>
                            <option value="img_4.jpg">Image 4</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text_presentation">Description Article:</label>
                    <textarea name="description_article_modify" type="password" class="form-control" id="text_presentation" rows="6" cols="50"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <input name="checklist_users[]" value="En" class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Enseignant
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="Pa" class="form-check-input" type="checkbox" id="gridCheck2">
                        <label class="form-check-label" for="gridCheck2">
                            Parent
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="E" class="form-check-input" type="checkbox" id="gridCheck3">
                        <label class="form-check-label" for="gridCheck3">
                            Élève
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="P" class="form-check-input" type="checkbox" id="gridCheck4">
                        <label class="form-check-label" for="gridCheck4">
                            Primaire
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="M" class="form-check-input" type="checkbox" id="gridCheck5">
                        <label class="form-check-label" for="gridCheck5">
                            Moyen
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="S" class="form-check-input" type="checkbox" id="gridCheck6">
                        <label class="form-check-label" for="gridCheck6">
                            Secondaire
                        </label>
                    </div>
                    <div class="col">
                        <input name="checklist_users[]" value="S" class="form-check-input" type="checkbox" id="gridCheck7">
                        <label class="form-check-label" for="gridCheck7">
                            Tous
                        </label>
                    </div>
                </div>

                <button style="margin: 20px 0;" type="submit" class="btn btn-success">Modifier Article</button>
            </form>
        </div>
        <?php
    }

    public function display_upload_presentation_form()
    {
        ?>
            <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
                <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Présentation: </h3>
                <div style="padding: 10px;">
                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea">Titre de présentation de l'école:</label>
                            <input name="titre_presentation_ecole" class="form-control" id="exampleFormControlTextarea" required>
                        </div>
                        <div class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea5">Text de présentation de l'école:</label>
                            <textarea name="text_presentation_ecole" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                            <select id="imageSelect" name="image_presentation" class="form-select" aria-label="Default select example">
                                <option value="img_1.jpg">Image 1</option>
                                <option value="img_2.jpg">Image 2</option>
                                <option value="img_3.jpg">Image 3</option>
                                <option value="img_4.jpg" selected>Image 4</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Enregistrer</button>
<!--                        <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>-->
                    </form>
                </div>
            </div>
        <?php
    }

    public function display_delete_presentation_form($presentations)
    {
        ?>
            <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
                <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Présentation:</h3>
                <div style="padding: 10px;">
                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="delete_presentation">Veuillez sélectionner la presentation à supprimer:</label>
                            <select id="delete_presentation" name="delete_presentation" class="form-select" aria-label="Default select example">
                                <?php
                                while($presentation = $presentations->fetch()){
                                    ?>
                                    <option value=<?= (int) $presentation["id_presentation"]?>><?="Titre: ". $presentation["titre_presentation"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger">Supprimer</button>
<!--                        <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>-->
                    </form>
                </div>
            </div>
        <?php
    }

    public function display_modify_presentation_form($presentations)
    {
        ?>
            <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
                <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Présentation:</h3>
                <div style="padding: 10px;">
                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="modify_presentation">Veuillez sélectionner la presentation à supprimer:</label>
                            <select id="modify_presentation" name="modify_presentation" class="form-select" aria-label="Default select example">
                                <?php
                                while($presentation = $presentations->fetch()){
                                    ?>
                                    <option value=<?= (int) $presentation["id_presentation"]?>><?="Titre: ". $presentation["titre_presentation"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea">Titre de présentation de l'école:</label>
                            <input name="modify_titre_presentation" class="form-control" id="exampleFormControlTextarea" required>
                        </div>
                        <div class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea5">Text de présentation de l'école:</label>
                            <textarea name="modify_text_presentation" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                            <select id="imageSelect" name="modify_image_presentation" class="form-select" aria-label="Default select example">
                                <option value="img_1.jpg">Image 1</option>
                                <option value="img_2.jpg">Image 2</option>
                                <option value="img_3.jpg">Image 3</option>
                                <option value="img_4.jpg" selected>Image 4</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Modifier</button>
<!--                        <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>-->
                    </form>
                </div>
            </div>
        <?php
    }

    public function display_ens_classe_heure_travail($results)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Liste des enseignants associés avec leurs classes et leurs heures de travail: </h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Enseignant</th>
                        <th scope="col">Prenom Enseignant</th>
                        <th scope="col">Jour de Travail</th>
                        <th scope="col">Heure de Travail</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Cycle</th>
                        <th scope="col">Heure de Réception</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $i = 1;
                            while($result = $results->fetch()){
                                ?>
                                    <tr>
                                        <th scope="row"><?=$i?></th>
                                        <td><?=$result["nom_enseignant"]?></td>
                                        <td><?=$result["prenom_enseignant"]?></td>
                                        <td><?=$result["jour_travail"]?></td>
                                        <td><?=$result["heure_travail"]?></td>
                                        <td><?=$result["nom_classe"]?></td>
                                        <td><?=$result["nom_cycle"]?></td>
                                        <td><?=$result["heure_reception_enseignant"]?></td>
                                    </tr>
                                <?php
                                ++$i;
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }

    public function display_add_enseignant_form()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Enseignant: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="nom_ens">Nom Enseignant:</label>
                            <input name="ajouter_nom_ens" class="form-control" id="nom_ens" required>
                        </div>

                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="prenom_ens">Prenom Enseignant:</label>
                            <input name="prenom_ens" class="form-control" id="prenom_ens" required>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="jour">Jour Réception:</label>
                            <select id="jour" name="jour_reception" class="form-select" aria-label="Default select example">
                                <option value="Dimanche" selected>Dimanche</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                            </select>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="heure">Heure Réception:</label>
                            <select id="heure" name="heure_reception" class="form-select" aria-label="Default select example">
                                <option value="8:00" selected>8h</option>
                                <option value="9:00">9h</option>
                                <option value="10:00">10h</option>
                                <option value="11:00">11h</option>
                                <option value="14:00">14h</option>
                                <option value="15:00">15h</option>
                                <option value="16:00">16h</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_delete_enseignant_form($enseignants)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Enseignant: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="delete_ens">Veuillez sélectionner l'enseignant à supprimer:</label>
                        <select id="delete_ens" name="supprimer_ens" class="form-select" aria-label="Default select example">
                            <?php
                            while($enseignant = $enseignants->fetch()){
                                ?>
                                <option value=<?= (int) $enseignant["id_enseignant"]?>><?="ID: ". $enseignant["id_enseignant"] ." - ". "Nom: ". $enseignant["nom_enseignant"] ." - ". "Prenom: ". $enseignant["prenom_enseignant"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_modify_enseignant_form($enseignants)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Enseignant: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="modify_ens">Veuillez sélectionner l'enseignant à modifier:</label>
                        <select id="modify_ens" name="modifier_ens" class="form-select" aria-label="Default select example">
                            <?php
                            while($enseignant = $enseignants->fetch()){
                                ?>
                                <option value=<?= (int) $enseignant["id_enseignant"]?>><?="ID: ". $enseignant["id_enseignant"] ." - ". "Nom: ". $enseignant["nom_enseignant"] ." - ". "Prenom: ". $enseignant["prenom_enseignant"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="modify_nom_ens">Nom Enseignant:</label>
                            <input name="modifier_nom_ens" class="form-control" id="modify_nom_ens" required>
                        </div>

                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="add_prenom_ens">Prenom Enseignant:</label>
                            <input name="modifier_prenom_ens" class="form-control" id="add_prenom_ens" required>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="jour">Jour Réception:</label>
                            <select id="jour" name="modifier_jour_reception" class="form-select" aria-label="Default select example">
                                <option value="Dimanche" selected>Dimanche</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                            </select>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="heure">Heure Réception:</label>
                            <select id="heure" name="modifier_heure_reception" class="form-select" aria-label="Default select example">
                                <option value="8:00" selected>8h</option>
                                <option value="9:00">9h</option>
                                <option value="10:00">10h</option>
                                <option value="11:00">11h</option>
                                <option value="14:00">14h</option>
                                <option value="15:00">15h</option>
                                <option value="16:00">16h</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_add_enseignant_classe_heure_form($enseignants, $classes, $heures_travail)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Gestion Enseignant-Classe-Heure de Travail: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="ens">Veuillez sélectionner l'enseignant à ajouter:</label>
                        <select id="ens" name="ens" class="form-select" aria-label="Default select example">
                            <?php
                            while($enseignant = $enseignants->fetch()){
                                ?>
                                <option value=<?= (int) $enseignant["id_enseignant"]?>><?="Nom: ". $enseignant["nom_enseignant"] ." - ". "Prenom: ". $enseignant["prenom_enseignant"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="classe">Veuillez sélectionner la classe à associer:</label>
                        <select id="classe" name="classe" class="form-select" aria-label="Default select example">
                            <?php
                            while($classe = $classes->fetch()){
                                ?>
                                <option value=<?= (int) $classe["id_classe"]?>><?="Nom Classe: ". $classe["nom_classe"] ." - ". "Cycle: ". $classe["nom_cycle"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="heure_travail">Veuillez sélectionner l'here de travail de cet enseignant:</label>
                        <select id="heure_travail" name="heure_travail" class="form-select" aria-label="Default select example">
                            <?php
                            while($heure_travail = $heures_travail->fetch()){
                                ?>
                                <option value=<?= (int) $heure_travail["id_heure_travail"]?>><?="Jour: ". $heure_travail["jour_travail"] ." - ". "Heure: ". $heure_travail["heure_travail"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_modify_admin_form($admins)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Admin</h3>
            <form method="post" action="loginMaster.php">
                <div class="form-group">
                    <label for="modify_admin">Veuillez sélectionner l'admin à modifier:</label>
                    <select id="modify_admin" name="modify_admin" class="form-select" aria-label="Default select example">
                        <?php
                        while($admin = $admins->fetch()){
                            ?>
                            <option value=<?=(int) $admin["id_admin"]?>><?="ID: ". (int) $admin["id_admin"] . " - Nom Utilisateur: ". $admin["username_admin"]. " - Mot de passe Utilisateur: ". $admin["password_admin"]?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

               <div class="row">
                   <div class="form-group col">
                       <label for="admin_username">Nom d'Utilisateur:</label>
                       <input name="modify_admin_username" type="text" class="form-control" id="admin_username" aria-describedby="emailHelp">
                   </div>
                   <div class="form-group col">
                       <label for="admin_password">Mot de Passe:</label>
                       <input name="modify_admin_password" type="password" class="form-control" id="admin_password" aria-describedby="emailHelp">
                   </div>
               </div>

                <button style="margin: 20px 0;" type="submit" class="btn btn-danger">Modifier Admin</button>
            </form>
        </div>
        <?php
    }

    public function display_add_eleve_form($classes, $parents)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Élève: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="nom_eleve">Nom Élève:</label>
                            <input type="text" name="ajouter_nom_eleve" class="form-control" id="nom_eleve" required>
                        </div>

                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="prenom_eleve">Prenom Élève:</label>
                            <input type="text" name="ajouter_prenom_eleve" class="form-control" id="prenom_eleve" required>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="adresse_eleve">Adresse Élève:</label>
                            <input type="text" name="ajouter_adresse_eleve" class="form-control" id="adresse_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="email_eleve">E-mail Élève:</label>
                            <input type="email" name="ajouter_email_eleve" class="form-control" id="email_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="photo_eleve">Veuillez sélectionner la photo de l'élève:</label>
                            <select name="ajouter_photo_eleve" class="form-select" id="photo_eleve">
                                <option value="st_2.jpg">Image 1</option>
                                <option value="st_5.jpg">Image 2</option>
                                <option value="st_6.jpg">Image 3</option>
                                <option value="st_7.jpg">Image 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="dob_eleve">Date de Naissance Élève:</label>
                            <input type="date" name="ajouter_dob_eleve" class="form-control" id="dob_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="email_eleve">Année Élève:</label>
                            <input type="text" name="ajouter_annee_eleve" class="form-control" id="email_eleve" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="classe_eleve">Veuillez sélectionner la classe de l'élève:</label>
                            <select id="classe_eleve" name="ajouter_classe_eleve" class="form-select" aria-label="Default select example">
                                <?php
                                while($classe = $classes->fetch()){
                                    ?>
                                    <option value=<?= (int) $classe["id_classe"]?>><?="Nom Classe: ". $classe["nom_classe"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="parent_eleve">Veuillez sélectionner le parent de l'élève:</label>
                            <select id="parent_eleve" name="ajouter_parent_eleve" class="form-select" aria-label="Default select example">
                                <?php
                                while($parent = $parents->fetch()){
                                    ?>
                                    <option value=<?= (int) $parent["id_parent"]?>><?="Nom Parent: ". $parent["nom_parent"]." - ". "Prénom Parent: ". $parent["prenom_parent"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Ajouter Élève</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_delete_eleve_form($eleves)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Élève: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="form-group col">
                        <label for="remove_eleve">Veuillez sélectionner l'élève à supprimer:</label>
                        <select id="remove_eleve" name="supprimer_eleve" class="form-select" aria-label="Default select example">
                            <?php
                            while($eleve = $eleves->fetch()){
                                ?>
                                <option value=<?= (int) $eleve["id_eleve"]?>><?="Nom Classe: ". $eleve["nom_eleve"] . " - ". "Prenom Classe: ". $eleve["prenom_eleve"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger">Supprimer Élève</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_modify_eleve_form($eleves, $classes, $parents)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Élève: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="modify_eleve">Veuillez sélectionner l'élève à modifier:</label>
                        <select id="modify_eleve" name="modifier_eleve" class="form-select" aria-label="Default select example">
                            <?php
                            while($eleve = $eleves->fetch()){
                                ?>
                                <option value=<?= (int) $eleve["id_eleve"]?>><?="ID: ".$eleve["id_eleve"] . " - " . "Nom Classe: ". $eleve["nom_eleve"] . " - ". "Prenom Classe: ". $eleve["prenom_eleve"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="nom_eleve">Nom Élève:</label>
                            <input type="text" name="modifier_nom_eleve" class="form-control" id="nom_eleve" required>
                        </div>

                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="prenom_eleve">Prenom Élève:</label>
                            <input type="text" name="modifier_prenom_eleve" class="form-control" id="prenom_eleve" required>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="adresse_eleve">Adresse Élève:</label>
                            <input type="text" name="modifier_adresse_eleve" class="form-control" id="adresse_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="email_eleve">E-mail Élève:</label>
                            <input type="email" name="modifier_email_eleve" class="form-control" id="email_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="photo_eleve">Veuillez sélectionner la photo de l'élève:</label>
                            <select name="modifier_photo_eleve" class="form-select" id="photo_eleve">
                                <option value="st_2.jpg">Image 1</option>
                                <option value="st_5.jpg">Image 2</option>
                                <option value="st_6.jpg">Image 3</option>
                                <option value="st_7.jpg">Image 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="dob_eleve">Date de Naissance Élève:</label>
                            <input type="date" name="modifier_dob_eleve" class="form-control" id="dob_eleve" required>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus col">
                            <label for="email_eleve">Année Élève:</label>
                            <input type="text" name="modifier_annee_eleve" class="form-control" id="email_eleve" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="classe_eleve">Veuillez sélectionner la classe de l'élève:</label>
                            <select id="classe_eleve" name="modifier_classe_eleve" class="form-select" aria-label="Default select example">
                                <?php
                                while($classe = $classes->fetch()){
                                    ?>
                                    <option value=<?= (int) $classe["id_classe"]?>><?="Nom Classe: ". $classe["nom_classe"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="parent_eleve">Veuillez sélectionner le parent de l'élève:</label>
                            <select id="parent_eleve" name="modifier_parent_eleve" class="form-select" aria-label="Default select example">
                                <?php
                                while($parent = $parents->fetch()){
                                    ?>
                                    <option value=<?= (int) $parent["id_parent"]?>><?="Nom Parent: ". $parent["nom_parent"]." - ". "Prénom Parent: ". $parent["prenom_parent"]?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Modifier Élève</button>
                </form>
            </div>
        </div>
        <?php
    }

}