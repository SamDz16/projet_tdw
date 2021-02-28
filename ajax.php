<?php

if(isset($_GET["classe"])){
    require_once ("Model/ClasseModel.php");
    $classe_model = new ClasseModel();

    $res= "";

    $matieres = $classe_model->fetchMatieresClasse((int) $_GET["classe"]);
   ?>
    <div class="row">
        <div class="form-group col">
            <label for="add_jour_edt">Veuillez sélectionner le jour:</label>
            <select id="add_jour_edt" name="add_jour_edt" class="form-select" aria-label="Default select example">

                <option value="Dimanche">Dimanche</option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>

            </select>
        </div>

        <div class="form-group col">
            <label for="add_matiere_edt">Veuillez choisir la matiere:</label>
            <select id="add_matiere_edt" name="add_matiere_edt" class="form-select" aria-label="Default select example">
                <?php
                while($matiere = $matieres->fetch()){
                    ?>
                    <option value=<?= (int) $matiere["nom_matiere"]?>><?="Nom Matiere: ". $matiere["nom_matiere"]?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div style="margin: 20px 0;" class="form-group green-border-focus col">
            <label for="add_heure_debut_edt">Heure Debut:</label>
            <input type="time" name="add_heure_debut_edt" class="form-control" id="add_heure_debut_edt" required>
        </div>
        <div style="margin: 20px 0;" class="form-group green-border-focus col">
            <label for="add_heure_fin_edt">Heure Fin:</label>
            <input type="time" name="add_heure_fin_edt" class="form-control" id="add_heure_fin_edt" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter Matiere</button>
    <?php
}
