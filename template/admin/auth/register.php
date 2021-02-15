<?php

$this->view("admin.auth.header");

$httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
$registerStoreUrl = url("register-store");
$registerUrl = url("register");
$loginUrl = url("login");
?>
<div class="container">

    <form class="form-signin" method="post" action="<?php echo $registerStoreUrl ?>">
        <h2 class="form-signin-heading">Register</h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
            <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
            <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <input type="password" name="repassword" class="form-control" placeholder="Re-type Password">

            <button class="btn btn-lg btn-login btn-block" type="submit">Register</button>

            <div class="registration">
                Already Registered.
                <a class="" href="<?php echo $loginUrl ?>">
                    Login
                </a>
            </div>

        </div>

    </form>

</div>

<?php

if ($httpReferer == $registerUrl) {
    ?>
    <script type="text/javascript">
        swal({
            title: "Register Error!",
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

