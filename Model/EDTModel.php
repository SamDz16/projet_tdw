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

}