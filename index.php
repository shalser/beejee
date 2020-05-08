<?php
require_once 'config.php';

if (isset($_POST['name'])) {
$page = $_GET['page'];
} else {
$page = 1;
}



$page = $_GET['page'];
$notesOnPage = 3;
$from = ($page - 1) * $notesOnPage;

$field = $_POST['name'] ?? 'id';
$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
$field = addslashes($field);
$sql = "SELECT * FROM todo WHERE id > 0 ORDER BY `{$field}` LIMIT ?, ?";
$statement = $db->prepare($sql);
$statement->bindParam(1, $from, PDO::PARAM_INT);
$statement->bindParam(2, $notesOnPage, PDO::PARAM_INT);
$statement -> execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);


//-------------------------------------------------------------------------------------



$sql = 'SELECT COUNT(*) as count FROM todo';
$statement = $db->prepare($sql);
$statement -> execute();
$count = $statement->fetchAll(PDO::FETCH_ASSOC);
$count = $count[0]['count'];
$pagesCount = ceil($count / $notesOnPage);


if (isset($_COOKIE['user'])) {
    require 'header-register.php';
} else {
    require 'header.php';
}
require 'head.php';

?>



<h1>TODO</h1>
<div class="container">
<div class="row">
    <div class="col-sm sh-btn-add">
        <a href="add.php"><button type="button" class="btn btn-info sh-btn">Добавить задачу</button></a>
        <div id="result"></div> <!--ответ -->
        <form class="col-sm-4 inputs" action="index.php?page=1" method="post">
            <h6>Сортировать</h6>
            <label>Email
                <input type="checkbox" class="btn sh-btn" name="name" value="email">
            </label>
            <label>Имя пользователя
                <input type="checkbox" class="btn sh-btn" name="name" value="name">
            </label>
            <label>Статус
                <input type="checkbox" class="btn sh-btn" name="name" value="status">
            </label>
            <button type="submit" class="btn sh-btn btn-primary" id="submit">Показать</button>
        </form>
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
        <?php
        if ($datas['status'] == 1) {
            $style_ok = 'background-color:green; border-color: green;';
            $style_red = 'display: block';
            $style_green = 'display: none';
            $style_p = 'text-decoration: line-through';
        } else {
            $style_no = 'background-color:red; border-color: red; a -> p{text-decoration: line-through};';
            $style_green = 'display: block';
            $style_red = 'display: none';
            $style_p = '';
        }

        ?>
    <div class="row" style="<?=$style_p?>">

        <a style="<?=$style_green?>" href="status1.php?page=1&id=<?=$datas['id']?>"><p class="col-sm-1 sh-input statusok"><button style="<?=$style_no?>" type="button" class="btn sh-btn btn-success"></button></p></a>
        <a style="<?=$style_red?>" href="status2.php?page=1&id=<?=$datas['id']?>"><p class="col-sm-1 sh-input statusno"><button style="<?=$style_ok?>" type="button" class="btn sh-btn btn-success"></button></p></a>
        <p class="col-sm-2"><?=$datas['name'] ?></p>
        <p class="col-sm-3"><?=$datas['email'] ?></p>
        <p class="col-sm-3"><?=htmlentities($datas['text'])?></p>
        <div class="col-sm-3">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="show.php?page=1&id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-primary">show</button></a>
                <a href="edit.php?page=1&id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-success">edit</button></a>
                <a href="delete.php?page=1&id=<?=$datas['id']?>"><button type="button" class="btn sh-btn btn-danger">delete</button></a>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <?php
    for ($i = 1; $i <= $pagesCount; $i++) {
        if ($page == $i) {
            echo "<a href=\"?page=$i\" class=\"bold\">$i</a> ";
        } else {
            echo "<a href=\"?page=$i\">$i</a> ";
        }
    }

    ?>

    <h5 class="sh-message-ok"><?php
        if (isset($_COOKIE['ok'])) {
            echo $_COOKIE['ok'];
        }
        if (isset($_COOKIE['auth'])) {
            echo $_COOKIE['auth'];
        }
        if (isset($_COOKIE['out'])) {
            echo $_COOKIE['out'];
        }
        ?></h5>
    <script type="text/javascript">
        setTimeout(function(){$('.sh-message-ok').fadeOut('fast')},5000);  //5000 = 5 секунд
    </script>
</div>

<?php require 'footer.php'; ?>





