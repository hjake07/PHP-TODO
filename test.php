<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href=# class="navbar-brand bigger">To Do List</a>
  </nav>
  <form action="add_task.php" method="POST" class="addForm">
  <input type="text" name="task_name" placeholder="Task Name" required>
  <button class="btn btn-primary" type="submit">Add Task</button>
</form>
<div class="hr"></div>
<div class="container">
<?php
$idVar = 0;
$host = 'localhost';
$port = 5432;
$dbname = 'PHP-TODO';
$user = 'postgres';
$password = 'postgres';
$query = "SELECT * FROM todos";
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$connection) {
    echo "Failed to connect to the database.";
    exit;
}

$result = pg_query($connection, $query);
if (!$result) {
    echo "Error executing the query.";
    exit;
}
while ($row = pg_fetch_assoc($result)) {
  $taskName = $row['todo'];
  $id = $row['id'];
  echo "<form class=\"listForm\" action=\"remove_task.php\" method=\"POST\"><input type=\"hidden\" value=\"$id\" name=\"task_id\"><p class=\"listItem\" id=\"listItem\">$taskName</p><button class=\"btn btn-danger\" type=\"submit\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></form>";
}

?>
</div>
</body>
</html>
