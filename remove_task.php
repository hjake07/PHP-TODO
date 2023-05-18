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
$taskId = $_POST['task_id']; // or $_POST['id'] if using a form

$query = "DELETE FROM todos WHERE id = $taskId";
$result = pg_query($connection, $query);

if ($result) {
    echo "Task removed successfully.";
    header("Location: http://localhost:3000/test.php");
    exit;
} else {
    echo "Error removing the task.";
}

?>
