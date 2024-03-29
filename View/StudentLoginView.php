<?php

class StudentLoginView
{
    public function display_student_login_view()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="margin-bottom: 0;">Espace élève - Login</h3>
            <form style="padding: 15px;" method="post" action="studentLoginMaster.php" enctype="multipart/form-data">
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText1">Nom Elève:</label>
                    <input name="student_lastname" type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>
                <div style="margin: 0 0 5px 0;" class="form-group">
                    <label style="margin-bottom: 5px;" for="exampleInputText2">Prénom Elève</label>
                    <input name="student_firstname" type="text" class="form-control" id="exampleInputText2" aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Vos données vont rester secret
                    </small>
                </div>

                <button type="submit" class="btn btn-success">S'authentifier</button>
                <a style="color: #fff;" href="index.php" class="btn btn-secondary">Revenir vers la page d'accueil</a>
            </form>
        </div>
        <?php
    }
}