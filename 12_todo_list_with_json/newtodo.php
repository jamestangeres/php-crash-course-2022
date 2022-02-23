<?php
$todoName = $_POST['todo_name'] ?? '';
$todoName = trim($todoName);

if ($todoName) {
    // check if todo.json exist
    if (file_exists('todo.json')) {
        // get json file
        $json = file_get_contents("todo.json");
        // print_r($json);

        // convert to associative array
        $jsonArray = json_decode($json, true);
    }else{
        $jsonArray = [];
    }

    $jsonArray[$todoName] = ['completed' => false];

    // save file to json
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('location: index.php');