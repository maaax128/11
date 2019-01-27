<?php
session_start();
$userId=$_SESSION['user_id'];
$taskId=$_POST['task_id'];
$assignedUserId = $_POST['assigned_user_id'];
require('connect.php');
$assignedUserId = $pdo->prepare("UPDATE task SET assigned_user_id='$assignedUserId' WHERE user_id='$userId' AND id='$taskId' LIMIT 1");
$assignedUserId->execute();
header("Location:toDoList.php");
?>