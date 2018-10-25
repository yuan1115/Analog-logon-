<?php 
//账号密码固定的
if($_POST){
	if($_POST['username']=='账号'&&$_POST['password']=='密码'){
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