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
        $res = $con->query("SELECT * FROM article WHERE cycle <> 'E' AND cycle <> 'Pa' ORDER BY data_ajout_article DESC LIMIT 8");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchOldArticles()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM article WHERE cycle <> 'E' AND cycle <> 'Pa' ORDER BY data_ajout_article ASC");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchArticle($id_article)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM article WHERE id_article= '$id_article'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchCycleArticles($c)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM  article WHERE cycle ='$c'");
        $this->deconnexionFromDB($con);
        return $res;
    }

}