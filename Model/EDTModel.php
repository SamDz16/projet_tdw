<?php


class EDTModel
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

    public function fetchEDTs($cycle)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM classe WHERE nom_cycle='$cycle'");
        $this->deconnexionFromDB($con);
        return $res;
    }
}