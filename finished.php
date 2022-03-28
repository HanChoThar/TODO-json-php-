<?php

if(file_exists('text.json')) {
  $json= file_get_contents('text.json');
  $jsonArray = json_decode($json, true);

  $finishedTodo = $_POST['todo_finished'];
  $jsonArray[$finishedTodo]['completed'] = !$jsonArray[$finishedTodo]['completed'];

  file_put_contents('text.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');