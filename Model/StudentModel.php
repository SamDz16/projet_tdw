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

    public function fetchStudent($student_username ,$student_password)
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM student WHERE student_username='$student_username' AND student_password='$student_password'");
        $this->deconnexionFromDB($con);
        return $res;
    }
}