<?php


class ParentModel
{
    private function connexionToDB()
    {
        $dsn = "mysql:dbname=project_tdw; host = 127.0.0.1; ";
        try{
            return new PDO($dsn, "root", "");
        }catch(PDOException $exp){
            exit();
        }
    }

    private function deconnexionFromDB($con)
    {
        $con = null;
        return 1;
    }

    public function fetchParent($parent_firstname, $parent_lastname)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM parent WHERE nom_parent='$parent_lastname' AND prenom_parent='$parent_firstname'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchParents()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM parent");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchParentSons($parent_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_eleve,prenom_eleve,photo_eleve,date_naissance_eleve,annee_eleve,nom_classe,edt.id_EDT,nom_parent,prenom_parent FROM eleve INNER JOIN parent ON eleve.id_parent=parent.id_parent INNER JOIN classe ON eleve.id_classe=classe.id_classe INNER JOIN edt ON classe.id_EDT=edt.id_EDT WHERE parent.id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchNotes($parent_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_eleve,prenom_eleve,note,note.nom_matiere FROM eleve INNER JOIN parent ON eleve.id_parent=parent.id_parent INNER JOIN note ON note.id_eleve=eleve.id_eleve WHERE parent.id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchRemarquesEnseignant($parent_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_eleve,prenom_eleve,remarque,nom_enseignant,prenom_enseignant,heure_reception_enseignant FROM eleve INNER JOIN parent ON eleve.id_parent=parent.id_parent INNER JOIN remarque_enseignant ON remarque_enseignant.id_eleve=eleve.id_eleve INNER JOIN enseignant ON remarque_enseignant.id_enseignant=enseignant.id_enseignant WHERE parent.id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchActivities($parent_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_eleve,prenom_eleve,nom_activite FROM eleve INNER JOIN parent ON eleve.id_parent=parent.id_parent INNER JOIN participation ON participation.id_eleve=eleve.id_eleve INNER JOIN activite_extrascolaire ON activite_extrascolaire.id_activite=participation.id_activite  WHERE parent.id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function addParent($nom_parent, $prenom_parent, $adresse_parent, $tel_parent, $email_parent)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO parent (nom_parent,prenom_parent,adresse_parent,telephone_parent,email_parent) VALUES (:nom, :prenom, :adresse, :tel, :email)");
        $stmt->execute([':nom' => $nom_parent, ':prenom' => $prenom_parent, ':adresse' => $adresse_parent, ':tel' => $tel_parent, ':email' => $email_parent]);
        $this->deconnexionFromDB($con);
    }

    public function deleteParent($parent_id)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM parent WHERE id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
    }

    public function modifyParent($parent_id, $nom_parent, $prenom_parent, $adresse_parent,$email_parent, $tel_parent)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE parent set nom_parent='$nom_parent',prenom_parent='$prenom_parent',adresse_parent='$adresse_parent',email_parent='$email_parent',telephone_parent='$tel_parent' WHERE id_parent='$parent_id'");
        $this->deconnexionFromDB($con);
    }

}