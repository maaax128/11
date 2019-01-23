<?php
session_start();
$userId=$_SESSION['user_id'];
$taskId=$_SESSION['id'];
require('connect.php');
$taskStatus = $pdo->prepare("SELECT is_done FROM task WHERE user_id='$userId' AND id='$taskId'");
$taskStatus->execute();
$taskStatus = $taskStatus->fetchAll(PDO::FETCH_ASSOC);
var_dump($taskStatus);
$statusRequest1 = "UPDATE task SET is_done=";
$statusRequest2 = " WHERE user_id='$userId' AND id='$taskId' LIMIT 1";
if ($taskStatus[0]['is_done']=='1') {
	$changeStatus = $pdo->prepare("$statusRequest1".'0'."$statusRequest2");
	$changeStatus->execute();
} elseif ($taskStatus[0]['is_done']=='0') {
	$changeStatus = $pdo->prepare("$statusRequest1".'1'."$statusRequest2");
	$changeStatus->execute();
}
header("Location:toDoList.php");
?>
