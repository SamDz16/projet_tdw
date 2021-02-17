<?php


class PrimaryModel
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

    public function fetchPrimaryArticles()
    {
        $par = "P";
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM  article WHERE cycle ='P'");
        $this->deconnexionFromDB($con);
        return $res;
    }
}