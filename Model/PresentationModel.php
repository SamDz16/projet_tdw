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

    private function push_presentation_data($con, $titre_presentation_text, $text_presentation, $presentation_image)
    {
        $stmt = $con->prepare("INSERT INTO presentation (titre_presentation,text_presentation,image_presentation) VALUES (:titre, :text, :image)");
        $stmt->execute([':titre' => $titre_presentation_text, ':text' => $text_presentation, ':image' => $presentation_image]);
    }

    private function deconnexionFromDB($con)
    {
        $con = null;
        return 1;
    }

    public function upload_presentation($titre_presentation, $text_presentation, $presentation_image)
    {
        $con = $this->connexionToDB();
        $this->push_presentation_data($con, $titre_presentation, $text_presentation, $presentation_image);
        $this->deconnexionFromDB($con);
    }

    public function fetchPresentationData()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM presentation");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function deletePresentation($id_presentation)
    {
        $con = $this->connexionToDB();
        $res = $con->query("DELETE FROM presentation WHERE id_presentation='$id_presentation'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function modifyPresentation($id_presentation, $titre_presentation, $text_presentation, $image_presentation)
    {
        $con = $this->connexionToDB();
        $res = $con->query("UPDATE presentation set titre_presentation='$titre_presentation',text_presentation='$text_presentation',image_presentation='$image_presentation' WHERE id_presentation='$id_presentation'");
        $this->deconnexionFromDB($con);
        return $res;
    }
}