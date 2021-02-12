<?php


class MainController
{
    public function display_header()
    {
        ?>

        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
                    School site
                </a>
                <div class="d-flex">
                    <a href="">
                        <i style="color: #1DA1F2; margin: 0 5px" class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="">
                        <i style="color: #4267B2; margin: 0 5px;" class="fab fa-facebook-f fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>

        <?php
    }

    public function display_caroussel()
    {
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../public/img/img_1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../public/img/img_2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../public/img/img_3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../public/img/img_4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<?php
    }

    public function display_menu()
    {
        ?>

        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Acceuil</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#">Presentation Ecole</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cycle Enseignement</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Primaire</a></li>
                    <li><a class="dropdown-item" href="#">Moyen</a></li>
                    <li><a class="dropdown-item" href="#">Secondaire</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Espace</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Parent</a></li>
                    <li><a class="dropdown-item" href="#">Eleves</a></li>
                </ul>
            </li>
            <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="#">Contact</a>
        </nav>

        <?php
    }
    public function display_menu_with_no_style()
    {
        ?>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Presentaion Ecole</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cycle Enseignement</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Primaire</a></li>
                    <li><a class="dropdown-item" href="#">Moyen</a></li>
                    <li><a class="dropdown-item" href="#">Secondaire</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Espace</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Parent</a></li>
                    <li><a class="dropdown-item" href="#">Eleves</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>

        <?php
    }
}