<?php


class EDTModel
{
 private function connexionToDB()
    {
        $dsn = "mysql:dbname=project_tdw; host = 127.0.0.1; ";
        try {
            return new PDO($dsn, "root", "");
        } catch (PDOException $exp) {
            exit();
        }
    }

    private function deconnexionFromDB($con)
    {
        $con = null;
        return 1;
    }

    public function fetchEDTs($cycle)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM classe WHERE nom_cycle='$cycle'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchIdEDTs()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM edt");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchCycleEDTs($cycle)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM classe WHERE nom_cycle='$cycle'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchEDT($id_edt)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT jour_seance,heure_debut,heure_fin,nom_classe FROM seance INNER JOIN classe ON classe.id_EDT=seance.id_EDT WHERE seance.id_EDT='$id_edt'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchLignesEDTHeure($id_edt, $heure_debut, $heure_fin)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM seance WHERE id_EDT='$id_edt' AND heure_debut<='$heure_debut' AND heure_fin>='$heure_fin'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function addMatiereEDT($classe_id, $matiere_name, $jour, $heure_debut, $heure_fin)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO seance (jour_seance,heure_debut,heure_fin,nom_matiere,id_EDT) VALUES (:jour, :hd, :hf, :matiere, :edt)");
        $stmt->execute([':jour' => $jour, ':hd' => $heure_debut, ':hf' => $heure_fin, ':matiere' => $matiere_name, ':edt' => $classe_id]);
        $this->deconnexionFromDB($con);
    }

    public function deleteMatiereEDT($classe_id, $matiere_name, $jour, $heure_debut, $heure_fin){
        $con = $this->connexionToDB();
        $con->query("DELETE FROM seance WHERE id_EDT= '$classe_id' AND nom_matiere='$matiere_name' AND jour_seance='$jour' AND heure_debut='$heure_debut' AND heure_fin='$heure_fin'");
        $this->deconnexionFromDB($con);
    }

    public function modifyMatiereEDT($classe_id, $matiere_name, $jour, $heure_debut, $heure_fin, $m_matiere_name){
        $con = $this->connexionToDB();
        $con->query("UPDATE seance set nom_matiere='$m_matiere_name' WHERE id_EDT= '$classe_id' AND nom_matiere='$matiere_name' AND jour_seance='$jour' AND heure_debut='$heure_debut' AND heure_fin='$heure_fin'");
        $this->deconnexionFromDB($con);
    }

}