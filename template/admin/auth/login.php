<?php


$this->view("admin.auth.header");


$httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

$checkLoginUrl = url("check-login");
$LoginUrl = url("login");
$registerUrl = url("register");
?>

    <div class="container">

        <form class="form-signin" method="post" action="<?php echo $checkLoginUrl ?>">


            <h2 class="form-signin-heading">sign in</h2>
            <div class="login-wrap">
                <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="<?php echo $registerUrl ?>">
                        Create an account
                    </a>
                </div>
                <br>
            </div>

        </form>

    </div>

<?php

if ($httpReferer == $LoginUrl) {
    ?>
    <script type="text/javascript">
        swal({
            title: "Login Error!",
            text: "User information is wrong!!",
            icon: "error",
            buttons: "OK",
            dangerMode: true,
        })
    </script>

    <?php
}
?>


<?php

$this->view("admin.auth.footer");

?>