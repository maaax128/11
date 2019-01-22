<?php
require('connect.php');
if (!empty($_POST['date']) && !empty($_POST['description'])) {
	$userId = $_POST['user_id'];
	$assignedUserId = $_POST['assigned_user_id'];
	$isDone = $_POST['is_done'];
	$description = $_POST['description'];
	$date = $_POST['date'];
	
	$sth = $pdo->prepare("INSERT INTO task (user_id, assigned_user_id, description, is_done, date_added) VALUES ('$userId', '$assignedUserId', '$description', '$isDone', '$date')");
    $sth->execute();
}
header("Location:toDoList.php");
?>