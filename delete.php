<?php
if(file_exists('text.json')) {
  $json= file_get_contents('text.json');
  $jsonArray = json_decode($json, true);

  $deleteTodo = $_POST['todo_name'];
  unset($jsonArray[$deleteTodo]);

  file_put_contents('text.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');