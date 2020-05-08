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
    <h1>Регистрация</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="regAction.php">
                <input type="text" class="form-control reg" placeholder="Login" name="login">
                <input type="password" class="form-control reg" placeholder="Password" name="pass">
<!--                <input type="email" class="form-control reg" placeholder="Email" name="email">-->
                <button type="submit" class="btn btn-info sh-btn reg-btn">Зарегистрироваться</button>
                <a href="/?page=1"><button type="button" class="btn btn-info sh-btn reg-btn">Домой</button></a>
            </form>
            <h5 class="sh-message-ok"><?php
                if (isset($_COOKIE['incorrect-login'])) {
                    echo $_COOKIE['incorrect-login'];
                }
                if (isset($_COOKIE['incorrect-pass'])) {
                    echo $_COOKIE['incorrect-pass'];
                }
                ?></h5>
            <script type="text/javascript">
                setTimeout(function(){$('.sh-message-ok').fadeOut('fast')},5000);  //5000 = 5 секунд
            </script>
        </div>
    </div>
</div>



<?php require 'footer.php'; ?>

