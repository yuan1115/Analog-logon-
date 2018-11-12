<?php 
if($_POST){
	if($_POST['username']=='润银创世'&&$_POST['password']=='runyin998'){
		$_SESSION['token'] = 1;
		$data['status'] = 1;
		$data['msg'] = '登录成功';
	}else{
		$data['status'] = 0;
		$data['msg'] = '账号或密码错误';
	}
	print_r(json_encode($data));
}else{
	if(isset($_SESSION['token'])){
		include('./static/html/index.html');
	}else{
		include('./static/html/login.html');
	}
}
?>