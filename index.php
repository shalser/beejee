<?php require 'head.php';
require_once 'config.php';
$data = getAllTODO();
?>


<div class="container-fluid">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">BeeJee</a>
        <form class="form-inline">
            <a href="register.php"><button style="margin-right: 10px;" type="button" class="btn btn-info sh-btn">Регистрация</button></a>
            <a href="auth.php"><button type="button" class="btn btn-info sh-btn">Авторизоваться</button></a>
        </form>
    </nav>
</div>
<h1>TODO</h1>
<div class="row">
    <div class="col-sm sh-btn-add">
        <a href="add.php"><button type="button" class="btn btn-info sh-btn">Add</button></a>

        <div class="col-sm-6 inputs">
            <h6>Sort by</h6>
            <label>Email
                <input type="checkbox" class="btn sh-btn">
            </label>
            <label>Имя пользователя
                <input type="checkbox" class="btn sh-btn">
            </label>
            <label>Статус
                <input type="checkbox" class="btn sh-btn">
            </label>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
            <p class="col-sm-1">Статус</p>
            <p class="col-sm-2">Имя пользователя</p>
            <p class="col-sm-3">Email</p>
            <p class="col-sm-3">Текст задачи</p>
            <p class="col-sm-3">Action</p>
            <div class="col line">
                <hr>
            </div>
    </div>
    <?php foreach ($data as $datas):?>
    <div class="row">
        <p class="col-sm-1 sh-input"><input type="checkbox"></p>
        <p class="col-sm-2"><?=$datas['name'] ?></p>
        <p class="col-sm-3"><?=$datas['email'] ?></p>
        <p class="col-sm-3"><?=$datas['text'] ?></p>
        <div class="col-sm-3">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="show.php?id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-primary">show</button></a>
                <a href="edit.php?id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-success">edit</button></a>
                <a href="delete.php?id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-danger">delete</button></a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <h5 class="sh-message-ok"><?php
        if (isset($_COOKIE['ok'])) {
            echo $_COOKIE['ok'];
        }
        ?></h5>
    <script type="text/javascript">
        setTimeout(function(){$('.sh-message-ok').fadeOut('fast')},5000);  //5000 = 5 секунд
    </script>
</div>

<?php require 'footer.php'; ?>






