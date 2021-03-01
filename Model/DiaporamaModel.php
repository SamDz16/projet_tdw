<?php


class DiaporamaModel
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

    public function fetchDiaporamaImages()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM diaporama WHERE is_in_diapo=1");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchAllDiaporamaImages()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM diaporama");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchNoDiaporamaImages()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM diaporama WHERE is_in_diapo=0");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function unsetImageDiapo($image)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE diaporama set is_in_diapo=0 WHERE image_diapo='$image'");
        $this->deconnexionFromDB($con);
    }

    public function setImageDiapo($image)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE diaporama set is_in_diapo=1 WHERE image_diapo='$image'");
        $this->deconnexionFromDB($con);
    }


    public function modifyImageDiapo($image1, $image2)
    {
        $this->unsetImageDiapo($image1);
        $this->setImageDiapo($image2);
    }

    public function addImageDiapo($image_name)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO diaporama (image_diapo) VALUES (:image)");
        $stmt->execute([':image' => $image_name]);
        $this->deconnexionFromDB($con);
    }

    public function deleteImageDiapo($image_name)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("DELETE FROM diaporama WHERE image_diapo='$image_name'");
        $stmt->execute([':image' => $image_name]);
        $this->deconnexionFromDB($con);
    }
}