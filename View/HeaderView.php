<style>
    nav{
        margin-bottom: 20px;
    }
</style>

<?php


class HeaderView
{
    public function display_header()
    {
        ?>

        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img style="position: relative; top: 3px;" src="static/logo.png" alt="logo image" width="30" height="24" class="d-inline-block align-top">
                    DZ School
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
}