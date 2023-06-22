<?php
$host = 'localhost';
$port = 5432;
$dbname = 'PHP-TODO';
$user = 'postgres';
$password = 'postgres';

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$connection) {
    echo "Failed to connect to the database.";
    exit;
}

$taskId = $_POST['task_id'];
$newTask = $_POST['new_task']; // Assuming you have a field named 'new_task' in your form

$query = "UPDATE todos SET todo = '$newTask' WHERE id = $taskId";
$result = pg_query($connection, $query);

if ($result) {
    echo "Task updated successfully.";
    header("Location: http://localhost:3000/test.php");
    exit;
} else {
    echo "Error updating the task.";
}
?>
