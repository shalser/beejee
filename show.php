<?php require_once 'config.php';
$info = showTODO($_GET['id']);
require 'head.php'; ?>

<div class="container sh-show">
    <h6>Просмотр</h6>
    <div class="row">

        <div class="col">
            <div class="col-sm-6"><span class="sh-bold right">Name:</span> <?=$info['name'] ?></div>
            <div class="col-sm-6"><span class="sh-bold right">Email:</span> <?=$info['email'] ?></div>
            <div class="col-sm-6"><span class="sh-bold right">TODO:</span> <?=$info['text'] ?></div>
        </div>

    </div>
    <a href="/"><button type="button" class="btn btn-success sh-btn">Home</button></a>
</div>


<?php require 'footer.php'; ?>
