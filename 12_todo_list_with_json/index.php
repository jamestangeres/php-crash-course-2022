<?php

$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="newtodo.php" method="POST">
        <input type="text" name="todo_name" placeholder="Enter your code">
        <button>New Todo</button>
    </form>
    <br>
    <?php foreach ($todos as $todoName => $todo) : ?>
        <div style="margin-bottom: 20px;">
            <form action="change_status.php" method="post" style="display: inline-block;">
                <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">
                <input type="checkbox" class="" <?php echo $todo['completed'] ? 'checked' : '' ?>>
            </form>

            <?php echo $todoName; ?>
            <form action="delete.php" method="POST" style="display: inline-flex;">
                <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">
                <button href="delete.php">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch =>{
            ch.onclick = function () {
                this.parentNode.submit();
            };
        })
    </script>
</body>

</html>