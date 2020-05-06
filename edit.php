<?php
require_once 'config.php';
if (isset($_COOKIE['user'])) {
    require 'header-register.php';
} else {
    require 'header.php';
}
require 'head.php';
$info = showTODO($_GET['id']);
?>

<div class="container sh-container">
    <h1>Редактировать задачу</h1>
    <div class="row">
        <div class="col-sm">
            <form action="editAction.php?id=<?=$info['id']?>" method="POST">
                <label>Name
                    <input class="sh-iw left-up" type="text" name="name" value="<?=$info['name']?>">
                </label>
                <br>
                <label>Email
                    <input class="sh-iw left" type="email" name="email" value="<?=$info['email']?>">
                </label>
                <br>
                <label>Edit TODO
                    <input class="sh-iw" type="text" name="add" value="<?=$info['text']?>">
                </label>
                <br>
                <button type="submit" class="btn btn-info sh-btn">Редактировать</button>
                <a href="/"><button type="button" class="btn btn-success sh-btn">Домой</button></a>
            </form>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>

