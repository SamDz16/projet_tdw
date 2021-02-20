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

}