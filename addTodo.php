<?php

$todo = $_POST['todoName'] ?? '';
$todo = trim($todo);

if($todo) {
  if(file_exists('text.json')) {
    $json= file_get_contents('text.json');
    $jsonArray = json_decode($json, true);
    $jsonArray[$todo]['completed'] = false;
    file_put_contents('text.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
  } else {
    $jsonArray = [];
  }
}

header('Location: index.php');