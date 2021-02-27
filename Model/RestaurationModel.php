<?php


class RestaurationModel
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

    public function fetchDishes()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM restauration ORDER BY date ASC");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function addRepas($jour, $date, $repas)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO restauration (jour,date,repas) VALUES (:jour, :date, :repas)");
        $stmt->execute([':jour' => $jour, ':date' => $date, ':repas' => $repas]);
        $this->deconnexionFromDB($con);
    }

    public function deleteRepas($jour)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM restauration WHERE jour='$jour'");
        $this->deconnexionFromDB($con);
    }

    public function modifyRepas($jour, $date, $repas)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE restauration set jour='$jour',date='$date',repas='$repas' WHERE jour='$jour' AND date='$date'");
        $this->deconnexionFromDB($con);
    }
}