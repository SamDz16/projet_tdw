<?php


class RestaurationView
{
    public function display_restauration_menu($dishes)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Menu de la restauration chez DZ School: </h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jour</th>
                    <th scope="col">Date</th>
                    <th scope="col">Repas</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $i = 1;
                    while($dish = $dishes->fetch()){
                    ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$dish["jour"]?></td>
                    <td><?=$dish["date"]?></td>
                    <td><?=$dish["repas"]?></td>
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

    public function display_ajouter_restauration_form()
    {
     ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Repas</h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col">
                            <label for="ajouter_repas">Veuillez sélectionner le jour:</label>
                            <select id="ajouter_repas" name="ajout_gestion_jour_restauration" class="form-select" aria-label="Default select example">
                                <option value="Dimanche">Dimanche</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="ajouter_date">Veuillez sélectionner la date:</label>
                            <input name="ajout_gestion_date_restauration" type="date" class="form-control" id="ajouter_date" aria-describedby="textHelp">
                        </div>
                        <div class="form-group col">
                            <label for="ajouter_repas">Veuillez entrer le repas:</label>
                            <input name="ajout_gestion_repas_restauration" type="text" class="form-control" id="ajouter_repas" aria-describedby="textHelp">
                        </div>
                    </div>

                    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Ajouter Repas</button>
                </form>
            </div>
        </div>
     <?php
    }

    public function display_delete_restauration_form()
    {
     ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Repas</h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="form-group col">
                        <label for="supprimer_repas">Veuillez sélectionner le jour:</label>
                        <select id="supprimer_repas" name="supprimer_gestion_jour_restauration" class="form-select" aria-label="Default select example">
                            <option value="Dimanche">Dimanche</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                        </select>
                    </div>
                    <button style="margin-top: 20px;" type="submit" class="btn btn-danger">Supprimer Repas</button>
                </form>
            </div>
        </div>
     <?php
    }

    public function display_modify_restauration_form()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Repas</h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col">
                            <label for="modifier_repas">Veuillez sélectionner le jour:</label>
                            <select id="modifier_repas" name="modifier_gestion_jour_restauration" class="form-select" aria-label="Default select example">
                                <option value="Dimanche">Dimanche</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="modifier_date">Veuillez sélectionner la date:</label>
                            <input name="modifier_gestion_date_restauration" type="date" class="form-control" id="modifier_date" aria-describedby="textHelp">
                        </div>
                        <div class="form-group col">
                            <label for="modifier_repas">Veuillez entrer le repas:</label>
                            <input name="modifier_gestion_repas_restauration" type="text" class="form-control" id="modifier_repas" aria-describedby="textHelp">
                        </div>
                    </div>

                    <button style="margin-top: 20px;" type="submit" class="btn btn-success">Modifier Repas</button>
                </form>
            </div>
        </div>
        <?php
    }

}