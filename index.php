<?php

$todoLists = [];
if(file_exists('text.json')) {
  $json= file_get_contents('text.json');
  $jsonArray = json_decode($json, true);
}
$results = array_reverse($jsonArray);
$todoLists = $results;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Todo app</title>
</head>
<body>
  <h2 class="text-center p-4 text-primary">Simple Todo App with PHP</h2>

  <form action="addTodo.php" method="post" class="w-75 mx-auto">
    <div class="input-group">
      <input type="text" name="todoName" class="form-control">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </form>
  <?php if(empty($todoLists)) { ?>
    <h4 class="text-center text-secondary p-4">Empty! Add some todo</h4>
  <?php } else { ?>
  <?php foreach($todoLists as $todoKey => $todoList): ?>
    <div class="w-75 mx-auto d-flex justify-content-between align-items-center bg-info my-3">
      <form action="finished.php" method="POST" class="p-3">
            <input class="form-check-input all" type="checkbox" name="todo_finished" value="<?php echo $todoKey ?>" id="flexCheckDefault" <?php echo $todoList['completed'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="flexCheckDefault"></label>
      </form>
      <div class="text-white">
        <?php echo $todoKey ?> 
      </div>
      <form action="delete.php" method="POST" class="m-3">
        <input type="hidden" name="todo_name" value="<?php echo $todoKey ?>">
        <input type="submit" class="btn btn-danger" value="delete">
      </form>
    </div>
  <?php endforeach ?>
  <?php } ?>
  
  <script>
    let some = document.querySelectorAll(".all");
    some.forEach(e => {
      e.onclick = function() {
        return this.parentNode.submit();
      }
    });
  </script>
</body>
</html>