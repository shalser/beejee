<?php require_once 'config.php';

?>
<div class="container-fluid">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">BeeJee</a>
        <form class="form-inline">
            <button style="margin-right: 10px;" type="button" class="btn btn-info sh-btn disabled"><?=($_COOKIE['user']) ?></button>
            <a href="out.php"><button type="button" class="btn btn-info sh-btn">Выйти</button></a>
        </form>
    </nav>
</div>
