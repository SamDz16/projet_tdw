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
        $res = $con->query("SELECT * FROM article WHERE cycle <> 'E' AND cycle <> 'Pa' AND cycle <> 'Ens' ORDER BY data_ajout_article DESC LIMIT 8");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchAllArticles()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM article");
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

    public function addArticle($titre_article, $image_article, $description_article, $users)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO article (tittre_article,image_article,description_article,cycle) VALUES (:titre, :image, :description, :users)");
        $stmt->execute([':titre' => $titre_article, ':image' => $image_article, ':description' => $description_article, ':users' => $users]);
        $this->deconnexionFromDB($con);
    }

    public function deleteArticle($id_article){
        $con = $this->connexionToDB();
        $con->query("DELETE FROM article WHERE id_article= '$id_article'");
        $this->deconnexionFromDB($con);
    }

    public function modifyArticle($id_article, $titre_article, $image_article, $description_article, $users)
    {
        $con = $this->connexionToDB();
        $res = $con->query("UPDATE article set tittre_article='$titre_article',image_article='$image_article',description_article='$description_article',cycle='$users' WHERE id_article='$id_article';");
        $this->deconnexionFromDB($con);
        return $res;
    }

}