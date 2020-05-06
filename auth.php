<?php
require_once 'config.php';

if (isset($_COOKIE['user'])) {
    require 'header-register.php';
} else {
    require 'header.php';
}
require 'head.php';

?>

<div class="container sh-container">
    <h1>Авторизация</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="authAction.php">
                <input type="text" class="form-control reg" placeholder="Login" name="login">
                <input type="password" class="form-control reg" placeholder="Password" name="pass">
<!--                <input type="email" class="form-control reg" placeholder="Email" name="email">-->
                <button type="submit" class="btn btn-info sh-btn reg-btn">Авторизоваться</button>
                <a href="/"><button type="button" class="btn btn-info sh-btn reg-btn">Домой</button></a>
            </form>
        </div>
    </div>
</div>



<?php require 'footer.php'; ?>


