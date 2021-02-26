<?php


class AdminLoginModel
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

    private function fetchAdminData($con)
    {
        return $con->query("SELECT * FROM admin WHERE id_admin=0")->fetch();
    }

    private function deconnexionFromDB($con)
    {
        $con = null;
        return 1;
    }

    public function admin_login()
    {
        $con = $this->connexionToDB();
        $res = $this->fetchAdminData($con);
        $r = $this->deconnexionFromDB($con);
        return $res;
    }

    public function fetchAdmins()
    {
        $con = $this->connexionToDB();
        $res = $con->query("SELECT * FROM admin WHERE id_admin=0");
        $this->deconnexionFromDB($con);
        return $res;
    }

    public function modifyAdmin($admin_username, $admin_password)
    {
        $con = $this->connexionToDB();
        $con->query("UPDATE admin set username_admin='$admin_username',password_admin='$admin_password' WHERE id_admin=0");
        $this->deconnexionFromDB($con);
    }

}