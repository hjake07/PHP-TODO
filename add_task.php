<?php
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taskName = $_POST['task_name'];

  // Perform necessary validations on the input data

  // Insert the task into the database
  $query = "INSERT INTO todos (todo) VALUES ('$taskName')";
  $result = pg_query($connection, $query);

  if ($result) {
    echo "Task added successfully.";
    header("Location: http://localhost:3000/test.php");
        exit;
  } else {
    echo "Error adding the task.";
  }
}
?>
