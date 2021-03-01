<?php


class EnseignantModel
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

    public function fetchTeacher($ens_lastname, $ens_firstname)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM enseignant WHERE nom_enseignant='$ens_lastname' AND prenom_enseignant='$ens_firstname'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchEnseignants()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM enseignant");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchEnseignantsCycle($cycle)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT DISTINCT enseignant.id_enseignant, enseignant.nom_enseignant,prenom_enseignant FROM enseignant INNER JOIN ligne_ens_classe ON enseignant.id_enseignant=ligne_ens_classe.id_enseignant INNER JOIN classe on ligne_ens_classe.id_classe=classe.id_classe WHERE classe.nom_cycle='$cycle'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function add_enseignant($nom_ens, $prenom_ens, $heure_reception)
    {
        $con = $this->connexionToDB();
        $con->query("INSERT INTO enseignant (nom_enseignant,prenom_enseignant,heure_reception_enseignant) VALUES ('$nom_ens', '$prenom_ens', '$heure_reception')");
        $this->deconnexionFromDB($con);
    }

    public function delete_enseignant($id_enseignant)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM enseignant WHERE id_enseignant='$id_enseignant'");
        $this->deconnexionFromDB($con);
    }

    public function modify_enseignant($id_enseignant, $nom_enseignant, $prenom_enseignant, $heure_reception)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE enseignant set nom_enseignant='$nom_enseignant',prenom_enseignant='$prenom_enseignant',heure_reception_enseignant='$heure_reception' WHERE id_enseignant='$id_enseignant';");
        $this->deconnexionFromDB($con);
    }

    public function add_ens_classe_heure_travail($id_enseignant, $id_classe, $id_heure_travail)
    {
        $con = $this->connexionToDB();
        $con->query("INSERT INTO ligne_ens_classe (id_enseignant,id_classe,id_heure_travail) VALUES ('$id_enseignant','$id_classe','$id_heure_travail')");
        $this->deconnexionFromDB($con);
    }

    public function fetch_enseignant_classe_heure_travail()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_enseignant,prenom_enseignant,jour_travail,heure_travail,nom_classe,nom_cycle,heure_reception_enseignant FROM ligne_ens_classe INNER JOIN enseignant ON ligne_ens_classe.id_enseignant=enseignant.id_enseignant INNER JOIN classe ON ligne_ens_classe.id_classe=classe.id_classe INNER JOIN heure_travail ON ligne_ens_classe.id_heure_travail=heure_travail.id_heure_travail ORDER BY nom_enseignant,jour_travail ASC");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchStudentsOfTeacher($teacher_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT DISTINCT nom_enseignant,prenom_enseignant,photo_enseignant,heure_reception_enseignant,mail_enseignant,tel_enseignant,nom_eleve,prenom_eleve,photo_eleve,email_eleve,adresse_eleve,date_naissance_eleve,annee_eleve,nom_classe,nom_cycle,classe.id_EDT FROM ligne_ens_classe INNER JOIN enseignant ON ligne_ens_classe.id_enseignant=enseignant.id_enseignant INNER JOIN classe ON ligne_ens_classe.id_classe=classe.id_classe INNER JOIN eleve ON eleve.id_classe=classe.id_classe WHERE enseignant.id_enseignant='$teacher_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchTeacherById($teacher_id)
    {
        $con = $this->connexionToDB();
        return $con->query("SELECT * FROM enseignant WHERE id_enseignant='$teacher_id'");
        $this->deconnexionFromDB($con);
    }

    public function fetchEnseignantMatieres($teacher_id)
    {
        $con = $this->connexionToDB();
        return $con->query("SELECT DISTINCT nom_enseignant,prenom_enseignant,nom_matiere FROM enseignant INNER JOIN matiere ON enseignant.id_enseignant=matiere.id_enseignant WHERE enseignant.id_enseignant='$teacher_id'");
        $this->deconnexionFromDB($con);
    }

    public function fetchEnseignantEleveNotes($teacher_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_enseignant,prenom_enseignant,nom_eleve,prenom_eleve,classe.nom_classe,classe.nom_cycle,classe.id_EDT,matiere.nom_matiere,note FROM note INNER JOIN matiere ON note.nom_matiere=matiere.nom_matiere INNER JOIN eleve ON note.id_eleve=eleve.id_eleve INNER JOIN classe ON classe.id_classe=eleve.id_classe INNER JOIN enseignant ON matiere.id_enseignant=enseignant.id_enseignant WHERE enseignant.id_enseignant='$teacher_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchEnseignantClasses($teacher_id)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT DISTINCT classe.id_classe,classe.nom_classe from ligne_ens_classe INNER JOIN enseignant ON ligne_ens_classe.id_enseignant=enseignant.id_enseignant INNER JOIN classe ON classe.id_classe=ligne_ens_classe.id_classe WHERE enseignant.id_enseignant='$teacher_id'");
        $this->deconnexionFromDB($con);
        return $res;
    }
}