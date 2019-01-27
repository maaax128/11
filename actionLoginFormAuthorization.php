<?php
session_start();
if (empty($_POST['login']) || empty($_POST['password'])) {
	header("Location:loginFormAuthorization.html");
	exit;
} 
	require('connect.php');
	$login = $_POST['login'];
	$password = base64_encode ($_POST['password']);
	$sth = $pdo->prepare("SELECT * from user WHERE login='$login' AND password='$password'");
	$sth->execute();
	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($sth)) {
		foreach ($sth as $value) {
			$_SESSION['user_id']=$value['id'];
			$_SESSION['login']=$value['login'];
			$_SESSION['password']=$value['password'];
		
		}
		header("Location:toDoList.php");
		// echo "Вы авторизованы";
		// exit();
	} else {
		echo "Нет пользователя с такими параметрами";		
	}
?>