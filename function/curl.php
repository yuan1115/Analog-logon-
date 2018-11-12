<?php 
function _GetContent($url,$data='',$cookie='',$type=0,$isTo=0){
    $ch = curl_init();
    $ip = '220.181.108.91';  // 百度蜘蛛
    $timeout = 15;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_TIMEOUT,0);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    //伪造百度蜘蛛IP
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-FORWARDED-FOR:'.$ip.'','CLIENT-IP:'.$ip.''));
    //伪造百度蜘蛛头部
    curl_setopt($ch,CURLOPT_USERAGENT,"Safari/537.36 MicroMessenger/6.5.2.501 NetType/WIFI WindowsWechat QBCore/3.43.691.400 QQBrowser/9.0.2524.400");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    //登录cookie（模拟登录）
    if($cookie){
        if($type==0){
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
        }else{
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
        }
    }
    //重定向
    if($isTo==1){
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);//不返回请求体内容
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);//允许请求的链接跳转
    }
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    if($data){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    $content = curl_exec($ch);
    if($isTo==1){
        if(!curl_errno($ch)) {
            $redirect_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);//获取最终请求的url地址
        }
        return $redirect_url;
    }
    if($content === false)
    {//输出错误信息
        $no = curl_errno($ch);
        switch(trim($no))
        {
            case 28 : $error = '访问目标地址超时'; break;
            default : $error = curl_error($ch); break;
        }
        echo $error;
    }
    else
    {
        $succ = true;
        return $content;
    }
} 

function getDatalogin($url,$data='',$isTo=0){
    $cookie_file = dirname(__FILE__).'/cookie.txt';
    $max_time = isset($_SESSION['max_time'])?$_SESSION['max_time']:0;
    if($max_time-time()<=0){
        $login = "https://zmt.yizhuan5.com/Account/Login/LoginIn";
        $loginData['userName'] = '15620161735';
        $loginData['userPwd'] = 'runyin998';
        $loginData['Remember'] = 'true';
        $list = _GetContent($login,$loginData,$cookie_file);
        $_SESSION['max_time'] = time()+3600;
    }
    $list = _GetContent($url,$data,$cookie_file,1,$isTo);
    $listA = json_decode($list,true);
    if($isTo==1){
        $pd = $list;
    }else{
        $pd = $listA;
    }
    if(!$pd){
        $_SESSION['max_time'] = 0;
        getDatalogin($data);
    }else{
        return $list;
    }
}