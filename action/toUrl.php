<?php 
include('./function/curl.php');
$data = getDatalogin("https://q.yizhuan5.com/Common/Tool/ToUrl?data=".urlencode($_GET['data']),'',1);
echo "<script>window.location.href='".$data."'</script>";
?>