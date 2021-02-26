<?php


class FooterMenuView
{
    public function display_footer_menu()
    {
        ?>
            <div style="background: aliceblue; margin: 20px 0 0 0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="presentation_ecole.php">Presentaion Ecole</a>
                    </li>
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
                            <li><a class="dropdown-item" href="userRouter.php?userIs=eleve">Eleves</a></li>
                            <li><a class="dropdown-item" href="userRouter.php?userIs=parent">Parent</a></li>
                            <li><a class="dropdown-item" href="userRouter.php?userIs=enseignant">Enseignant</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        <?php
    }
}