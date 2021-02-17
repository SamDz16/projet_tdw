<?php


class PrincipalMenuView
{
    public function display_principal_menu()
    {
        ?>
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="">Acceuil</a>
            <a id="presentation_ecole" class="flex-sm-fill text-sm-center nav-link" href="presentation_ecole.php">Presentation Ecole</a>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cycle Enseignement</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="primaire.php">Primaire</a></li>
                    <li><a class="dropdown-item" href="moyen.php">Moyen</a></li>
                    <li><a class="dropdown-item" href="secondaire.php">Secondaire</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Espace</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Parent</a></li>
                    <li><a class="dropdown-item" href="#">Eleves</a></li>
                </ul>
            </li>
            <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="contact.php">Contact</a>
        </nav>

        <?php
    }
}