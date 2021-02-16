<?php


class AdminView
{
    public function display_admin_login()
    {
        ?>
        <div style="width: 90%; margin: 20px auto; border: 2px solid #1DA1F2; border-radius: 10px; padding: 20px;">
            <h3>Admin Login:</h3>
            <form method="post" action="/Controller/MainController.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Your data will remain secret!</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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
}