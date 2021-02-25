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

    public function fetchEnseignants()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM enseignant");
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
}