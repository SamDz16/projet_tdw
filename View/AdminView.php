<style>
    #admin-view{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        grid-gap: 10px;
    }
    #admin-view img{
        height: 150px;
    }
    #admin-view a{
        position: relative;
        bottom: 10px;
    }
</style>
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
<!--            <div>-->
<!--                <h1 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Page Administrateur: </h1>-->
<!--                <div style="padding: 10px;">-->
<!--                    <form method="post" action="loginMaster.php" enctype="multipart/form-data">-->
<!--                        <div style="margin: 20px 0;" class="form-group green-border-focus">-->
<!--                            <label for="exampleFormControlTextarea">Titre de présentation de l'école:</label>-->
<!--                            <input name="titre_presentation_ecole" class="form-control" id="exampleFormControlTextarea" required>-->
<!--                        </div>-->
<!--                        <div class="form-group green-border-focus">-->
<!--                            <label for="exampleFormControlTextarea5">Text de présentation de l'école:</label>-->
<!--                            <textarea name="text_presentation_ecole" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>-->
<!--                        </div>-->
<!--                        <div style="margin: 20px 0;" class="form-group green-border-focus">-->
<!--                            <label for="imageSelect">Veuillez choisir une image a uploader:</label>-->
<!--                            <select id="imageSelect" name="image" class="form-select" aria-label="Default select example">-->
<!--                                <option value="img_1.jpg">Image 1</option>-->
<!--                                <option value="img_2.jpg">Image 2</option>-->
<!--                                <option value="img_3.jpg">Image 3</option>-->
<!--                                <option value="img_4.jpg" selected>Image 4</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!---->
<!--                        <button type="submit" class="btn btn-success">Enregistrer</button>-->
<!--                        <a style="color: #fff; margin: 20px 0 20px 0;" href="deconnexion.php?userIs=admin" class="btn btn-danger">Déconnexion</a>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
        <?php
        ?>
            <div id="admin-view">
                <div id="article-details" class="card">
                    <img src="static/students/ad_1.jpg" class="card-img-top" alt="article view">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des articles</h5>
                        <p class="card-text">Gestion des article par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion des articles</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=article" class="btn btn-dark">Accéder à la page de gestion d'article</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_2.jpg" class="card-img-top" alt="presentation ecole">
                    <div class="card-body">
                        <h5 class="card-title">Gestion de la présentation de l'école</h5>
                        <p class="card-text">Gestion de la présentation de l'école par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion de la présentation de l'école</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=presentation_ecole" class="btn btn-dark">Accéder à la page de gestion de la présentation de l'école</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_3.jpg" class="card-img-top" alt="Gestion des emplois du temps">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des emplois du temps</h5>
                        <p class="card-text">Gestion des emplois du temps par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion des emplois du temps</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=emplois_du_temps" class="btn btn-dark">Accéder à la page de gestion des emplois du temps</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_4.jpg" class="card-img-top" alt="Gestion des enseignants">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des enseignants</h5>
                        <p class="card-text">Gestion des enseignants par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion des enseignants</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=enseignant" class="btn btn-dark">Accéder à la page de gestion des enseignants</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_5.jpg" class="card-img-top" alt="Gestion des utilisateurs">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des utilisateurs</h5>
                        <p class="card-text">Gestion des utilisateurs par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion des utilisateurs</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=utilisateur" class="btn btn-dark">Accéder à la page de gestion des utilisateurs</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_6.jpg" class="card-img-top" alt="Gestion de la restauration">
                    <div class="card-body">
                        <h5 class="card-title">Gestion de la restauration</h5>
                        <p class="card-text">Gestion de la restauration par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion de la restauration</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=restauration" class="btn btn-dark">Accéder à la page de gestion de la restauration</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_7.jpg" class="card-img-top" alt="Gestion de la page contact">
                    <div class="card-body">
                        <h5 class="card-title">Gestion de la page contact</h5>
                        <p class="card-text">Gestion de la page contact par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion de la page contact</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=contact" class="btn btn-dark">Accéder à la page de gestion de la page contact</a>
                </div>
                <div id="article-details" class=card">
                    <img src="static/students/ad_8.jpg" class="card-img-top" alt="Gestion du diaporama">
                    <div class="card-body">
                        <h5 class="card-title">Gestion du diaporama</h5>
                        <p class="card-text">Gestion du diaporama par admin</p>
                        <p style="margin-bottom: 0;" class="card-text"><small class="text-muted">Cliquez en dessous pour accéder à la page de gestion du diaporama</small></p>
                        <p class="card-text"><small class="text-muted">Catégorie: Admin Access</small></p>
                    </div>
                    <a style="color: #fff;" href="gestionAdmin.php?gestion=diaporama" class="btn btn-dark">Accéder à la page de gestion du diaporama</a>
                </div>
            </div>
        <?php

    }
}
?>