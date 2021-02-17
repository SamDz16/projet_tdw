<?php


class PresentationModel
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

    private function push_presentation_data($con, $presentation_text, $presentation_image)
    {
        $stmt = $con->prepare("INSERT INTO presentation VALUES (:text, :image)");
        $stmt->execute([':text' => $presentation_text, ':image' => $presentation_image]);
    }

    private function deconnexionFromDB($con)
    {
        $con = null;
        return 1;
    }

    public function upload_presentation($presentation_text, $presentation_image)
    {
        $con = $this->connexionToDB();
        $this->push_presentation_data($con, $presentation_text, $presentation_image);
        $r = $this->deconnexionFromDB($con);
    }

    public function fetchPresentationData()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM presentation");
        $r = $this->deconnexionFromDB($con);
        return $res;
    }
}