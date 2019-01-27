<?php
session_start();

require('connect.php');
if (!empty($_POST['date']) && !empty($_POST['description'])) {
	$userId = $_SESSION['user_id'];
	$assignedUserId = $_SESSION['user_id'];
	$isDone = 0;
	$description = $_POST['description'];
	$date = $_POST['date'];
	
	$sth = $pdo->prepare("INSERT INTO task (user_id, assigned_user_id, description, is_done, date_added) VALUES ('$userId', '$assignedUserId', '$description', '$isDone', '$date')");
    $sth->execute();
}
header("Location:toDoList.php");
?>