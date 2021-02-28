<style>
    #contact,
    #icons{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #contact img{
        width: 250px;
        height: 200px;
        margin-right: 40px;
        border-radius: 10px;
    }

    #icons a{
        color: #000;
        margin: 0 20px;
    }
</style>

<?php


class ContactView
{
    public function display_contact_page($contact_details, $icons)
    {
        ?>
        <div style="margin: 20px 0;" class="card-group">
            <?php
            while($contact_detail = $contact_details->fetch())
            {
                ?>
                <div style="margin: 20px 0;" class="media" id="contact">
                    <img src=<?="static/img/".$contact_detail["image_contact"]?> class="card-img-top" alt="<?=$contact_detail["image_contact"]?>">
                    <div class="media-body">
                        <h5 class="card-title"><?=$contact_detail["titre_contact"]?></h5>
                        <p class="card-text"><?=$contact_detail["text_contact"]?></p>
                        <div id="icons">
                            <?php
                            while($icon = $icons->fetch()){
                                ?>
                                    <a href="#"><i class="fa fa-<?=$icon["nom_icon"]?> fa-2x"></i></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    public function display_add_contact_form()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Text Contact: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div style="margin: 20px 0;" class="form-group green-border-focus">
                        <label for="aouter_titre_gestion_contact">Titre de présentation de l'école:</label>
                        <input type="text" name="ajouter_titre_gestion_contact" class="form-control" id="aouter_titre_gestion_contact" required>
                    </div>
                    <div class="form-group green-border-focus">
                        <label for="ajouter_text_gestion_contact">Text de présentation de l'école:</label>
                        <textarea name="ajouter_text_gestion_contact" class="form-control" id="ajouter_text_gestion_contact" rows="3"></textarea>
                    </div>
                    <div style="margin: 20px 0;" class="form-group green-border-focus">
                        <label for="ajouter_image_gestion_contact">Veuillez choisir une image a uploader:</label>
                        <select id="ajouter_image_gestion_contact" name="ajouter_image_gestion_contact" class="form-select" aria-label="Default select example">
                            <option value="contact.jpg" selected>Image 1</option>
                            <option value="contact_1.jpg">Image 2</option>
                            <option value="contact_2.jpg">Image 3</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter Paragraphe</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_delete_contact_form($contacts)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Contact:</h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="supprimer_titre_gestion_contact">Veuillez sélectionner la presentation à supprimer:</label>
                        <select id="supprimer_titre_gestion_contact" name="supprimer_titre_gestion_contact" class="form-select" aria-label="Default select example">
                            <?php
                            while($contact = $contacts->fetch()){
                                ?>
                                <option value=<?= (int) $contact["id_contact"]?>><?="Titre: ". $contact["titre_contact"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button style="margin: 20px 0;" type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function display_modify_contact_form($contacts)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Contact:</h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="modifier_gestion_contact">Veuillez sélectionner le paragraphe à modifier:</label>
                        <select id="modifier_gestion_contact" name="modifier_gestion_contact" class="form-select" aria-label="Default select example">
                            <?php
                            while($contact = $contacts->fetch()){
                                ?>
                                <option value=<?= (int) $contact["id_contact"]?>><?="Titre: ". $contact["titre_contact"]?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div style="margin: 20px 0;" class="form-group green-border-focus">
                        <label for="modifier_titre_gestion_contact">Titre de contact:</label>
                        <input name="modifier_titre_gestion_contact" class="form-control" id="modifier_titre_gestion_contact" required>
                    </div>
                    <div class="form-group green-border-focus">
                        <label for="modifier_text_gestion_contact">Text de contact:</label>
                        <textarea name="modifier_text_gestion_contact" class="form-control" id="modifier_text_gestion_contact" rows="3"></textarea>
                    </div>
                    <div style="margin: 20px 0;" class="form-group green-border-focus">
                        <label for="modifier_image_gestion_contact">Veuillez choisir une image a uploader:</label>
                        <select id="modifier_image_gestion_contact" name="modifier_image_gestion_contact" class="form-select" aria-label="Default select example">
                            <option value="contact.jpg" selected>Image 1</option>
                            <option value="contact_1.jpg">Image 2</option>
                            <option value="contact_2.jpg">Image 3</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
        <?php
    }

}