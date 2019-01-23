<?php
session_start();
$userId=$_SESSION['user_id'];
$taskId=$_SESSION['id'];
require('connect.php');
$taskDelete = $pdo->prepare("DELETE FROM task WHERE user_id='$userId' AND id='$taskId' LIMIT 1"); 
$taskDelete->execute();
header("Location:toDoList.php");
?>
