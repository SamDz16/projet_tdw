<?php


class AdminView
{
    public function display_admin_login()
    {
        ?>
        <div style="width: 90%; margin: 20px auto; border: 2px solid #1DA1F2; border-radius: 10px; padding: 20px;">
            <h3>Admin Login:</h3>
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
                <!--            <div class="mb-3 form-check">-->
                <!--                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                <!--            </div>-->
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <?php
    }

    public function display_admin_view()
    {
        ?>
            <div>
                <h1 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Page Administrateur: </h1>
                <div style="border: 2px solid #5cb85c; border-radius: 10px; padding: 10px;">
                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                        <div class="form-group green-border-focus">
                            <label for="exampleFormControlTextarea5">Présentation de l'école:</label>
                            <textarea name="presentation_ecole" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                        </div>
                        <div style="margin: 20px 0;" class="form-group green-border-focus">
                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>
                            <select id="imageSelect" name="image" class="form-control">
                                <option value="img_1.jpg">Image 1</option>
                                <option value="img_2.jpg">Image 2</option>
                                <option value="img_3.jpg">Image 3</option>
                                <option value="img_4.jpg" selected>Image 4</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                </div>
                <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>
            </div>
        <?php
    }
}
?>