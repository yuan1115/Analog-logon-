<?php
header("content-type:text/html;charset=utf-8");
session_start();
$action = !isset($_GET['action'])||($_GET['action'] == '') ? 'index' : $_GET['action'];
if(!isset($_SESSION['token'])&&$action!='login'){
	echo "<script>alert('请先登录')</script>";
	include('action/login.php');
}else{
	include('action/' . $action . '.php');
}
?>