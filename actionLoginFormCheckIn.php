<?php
session_start();
if (empty($_POST['login']) || empty($_POST['password'])) {
	header("Location:loginFormCheckIn.html");
	exit;
} 
	require('connect.php');
	$login = $_POST['login'];
    $password = base64_encode ($_POST['password']);
	$sth = $pdo->prepare("SELECT id from user WHERE login='$login'");
    $sth->execute();
    $sth = $sth->fetchAll(PDO::FETCH_ASSOC);
 
    if (!empty($sth)) {
    	echo "Такой логин уже существует";
    	require("loginFormCheckIn.php");
    	exit;
    }
	$sth = $pdo->prepare("INSERT INTO user (login, password) VALUES ('$login', '$password')");
    $sth->execute();
  
    $sth = $pdo->prepare("SELECT * from user WHERE login='$login' AND password='$password'");
    $sth->execute();
    $sth = $sth->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($sth)) {
        foreach ($sth as $value) {
            $_SESSION['user_id']=$value['id'];
            $_SESSION['login']=$value['login'];
            $_SESSION['password']=$value['password'];
        
        }
    }
        header("Location:toDoList.php");
?>