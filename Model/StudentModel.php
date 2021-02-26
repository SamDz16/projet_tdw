<?php


class StudentModel
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

    public function fetchStudent($student_firstname, $student_lastname)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM eleve WHERE nom_eleve='$student_lastname' AND prenom_eleve='$student_firstname'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchStudentDetails($student_firstname, $student_lastname)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_eleve,prenom_eleve,photo_eleve,date_naissance_eleve,annee_eleve,nom_classe,edt.id_edt FROM eleve INNER JOIN classe ON eleve.id_classe=classe.id_classe INNER JOIN edt ON classe.id_EDT=edt.id_EDT WHERE nom_eleve='$student_lastname' AND prenom_eleve='$student_firstname'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchStudentActivities($student_firstname, $student_lastname)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT nom_activite FROM eleve INNER JOIN participation ON eleve.id_eleve=participation.id_eleve INNER JOIN activite_extrascolaire ON participation.id_activite=activite_extrascolaire.id_activite WHERE nom_eleve='$student_lastname' AND prenom_eleve='$student_firstname'");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function addStudent($nom_eleve, $prenom_eleve, $adresse_eleve,$email_eleve,$photo_eleve,$date_naissance_eleve,$annee_eleve,$classe_eleve,$parent_eleve)
    {
        $con = $this->connexionToDB();
        $stmt = $con->prepare("INSERT INTO eleve (nom_eleve,prenom_eleve,adresse_eleve,email_eleve,photo_eleve,date_naissance_eleve,annee_eleve,id_classe,id_parent) VALUES (:nom, :prenom, :adresse, :email, :photo, :dob, :annee, :classe, :parent)");
        $stmt->execute([':nom' => $nom_eleve, ':prenom' => $prenom_eleve, ':adresse' => $adresse_eleve, ':email' => $email_eleve, ':photo' => $photo_eleve, ':dob' => $date_naissance_eleve, ':annee' => $annee_eleve, ':classe' => $classe_eleve, ':parent' => $parent_eleve]);
        $this->deconnexionFromDB($con);
    }

    public function deleteStudent($eleve_id)
    {
        $con = $this->connexionToDB();
        $con->query("DELETE FROM eleve WHERE id_eleve='$eleve_id'");
        $this->deconnexionFromDB($con);
    }

    public function fetchStudents()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM eleve");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function modifyStudent($eleve_id, $nom_eleve, $prenom_eleve, $adresse_eleve,$email_eleve,$photo_eleve,$date_naissance_eleve,$annee_eleve,$classe_eleve,$parent_eleve)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE eleve set nom_eleve='$nom_eleve',prenom_eleve='$prenom_eleve',adresse_eleve='$adresse_eleve',email_eleve='$email_eleve',photo_eleve='$photo_eleve',date_naissance_eleve='$date_naissance_eleve',annee_eleve='$annee_eleve',id_classe='$classe_eleve',id_parent='$parent_eleve' WHERE id_eleve='$eleve_id'");
        $this->deconnexionFromDB($con);
    }
}