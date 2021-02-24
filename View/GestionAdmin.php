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
<!--                        <div style="margin: 20px 0;" class="form-group green-border-focus">-->
<!--                            <label for="exampleFormControlTextarea">Titre de présentation de l'école:</label>-->
<!--                            <input name="delete_titre_presentation_ecole" class="form-control" id="exampleFormControlTextarea" required>-->
<!--                        </div>-->
<!--                        <div class="form-group green-border-focus">-->
<!--                            <label for="exampleFormControlTextarea5">Text de présentation de l'école:</label>-->
<!--                            <textarea name="delete_text_presentation_ecole" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>-->
<!--                        </div>-->
<!--                        <div style="margin: 20px 0;" class="form-group green-border-focus">-->
<!--                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>-->
<!--                            <select id="imageSelect" name="deete_image_presentation" class="form-select" aria-label="Default select example">-->
<!--                                <option value="img_1.jpg">Image 1</option>-->
<!--                                <option value="img_2.jpg">Image 2</option>-->
<!--                                <option value="img_3.jpg">Image 3</option>-->
<!--                                <option value="img_4.jpg" selected>Image 4</option>-->
<!--                            </select>-->
<!--                        </div>-->

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
}