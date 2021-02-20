<?php


class AdminView
{
    public function display_admin_login()
    {
        ?>
        <!-- Button trigger modal -->
        <button style="margin: 20px 0;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Connexion Admin
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php $this->display_form(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private function display_form()
    {
        ?>
        <form method="post" action="loginMaster.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="email" name="admin_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Your data will remain secret!</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="admin_password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <?php
    }

    public function display_admin_view()
    {
        ?>
            <div>
                <h1 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Page Administrateur: </h1>
                <div style="padding: 10px;">
                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea">Titre de présentation de l'école:</label>
                            <input name="titre_presentation_ecole" class="form-control" id="exampleFormControlTextarea" required>
                        </div>
                        <div class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea5">Text de présentation de l'école:</label>
                            <textarea name="text_presentation_ecole" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                            <select id="imageSelect" name="image" class="form-select" aria-label="Default select example">
                                <option value="img_1.jpg">Image 1</option>
                                <option value="img_2.jpg">Image 2</option>
                                <option value="img_3.jpg">Image 3</option>
                                <option value="img_4.jpg" selected>Image 4</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>
                    </form>
                </div>
            </div>
        <?php
    }
}
?>