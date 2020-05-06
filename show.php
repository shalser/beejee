<?php require_once 'config.php';
$info = showTODO($_GET['id']);
require 'head.php'; ?>

<div class="container sh-show">
    <h1>Просмотр</h1>
    <div class="row">

        <div class="col">
            <div class="col-sm-6"><span class="sh-bold right1">Имя пользователя:</span> <?=$info['name'] ?></div>
            <hr>
            <div class="col-sm-6"><span class="sh-bold right2">Email:</span> <?=$info['email'] ?></div>
            <hr>
            <div class="col-sm-6"><span class="sh-bold right3">Задача:</span> <?=$info['text'] ?></div>
            <hr>
            <div class="col-sm-6"><span class="sh-bold right4">Добавлена:</span><span class="sh-del"><?=substr($info['data'], 0, -7) ?></span></div>
            <hr>
        </div>

    </div>
    <a href="/"><button type="button" class="btn btn-success sh-btn">Домой</button></a>
</div>


<?php require 'footer.php'; ?>
