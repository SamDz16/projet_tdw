<?php


class NoteModel
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

    public function addNoteEleveMatiere($eleve_id, $matiere_name, $note)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO note (note,id_eleve,nom_matiere) VALUES (:note, :eleve, :matiere)");
        $stmt->execute([':note' => $note, ':eleve' => $eleve_id, ':matiere' => $matiere_name]);
        $this->deconnexionFromDB($con);
    }

    public function deleteNoteEleveMatiere($eleve_id, $matiere_name)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM note WHERE id_eleve='$eleve_id' AND nom_matiere='$matiere_name'");
        $this->deconnexionFromDB($con);
    }

    public function modifyNoteEleveMatiere($eleve_id, $matiere_name, $note)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE note set note='$note' WHERE id_eleve='$eleve_id' AND nom_matiere='$matiere_name'");
        $this->deconnexionFromDB($con);
    }

}