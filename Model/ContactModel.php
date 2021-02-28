<?php


class ContactModel
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

    public function fetchIcons()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM icon");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchContactDetails()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM contact");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function addContact($titre, $text, $image)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO contact (titre_contact,text_contact,image_contact) VALUES (:titre, :text, :image)");
        $stmt->execute([':titre' => $titre, ':text' => $text, ':image' => $image]);
        $this->deconnexionFromDB($con);
    }

    public function deleteContact($contact_id)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM contact WHERE id_contact='$contact_id'");
        $this->deconnexionFromDB($con);
    }

    public function modifyContact($contact_id, $titre, $text, $image)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE contact set titre_contact='$titre',text_contact='$text',image_contact='$image' WHERE id_contact='$contact_id'");
        $this->deconnexionFromDB($con);
    }

}