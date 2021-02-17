<?php


class ArticleModel
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

    public function fetchArticles()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM article ORDER BY data_ajout_article DESC LIMIT 8");
        $this->deconnexionFromDB($con);
        return $res;
    }
}