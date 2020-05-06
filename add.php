<?php require 'head.php';
require_once 'config.php';?>
<div class="container sh-container">
    <h1>Добавить задачу</h1>
    <div class="row">
        <div class="col-sm">
            <form action="addTodo.php" method="post">
            <label>Name
                <input class="sh-iw left-up" type="text" name="name">
            </label>
                <br>
                <label>Email
                    <input class="sh-iw left" type="email" name="email">
                </label>
                <br>
                <label>Add TODO
                    <input class="sh-iw" type="text" name="add">
                </label>
                <br>
                <button type="submit" id="addButton" class="btn btn-info sh-btn">Add</button>

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>