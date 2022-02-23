<?php
$json = file_get_contents('todo.json');
$jsonArray = json_decode($json, true);

$todoName = $_POST['todo_name'];
// change the completed status opposite
$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];

// save back file after delete
file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header('location: index.php');