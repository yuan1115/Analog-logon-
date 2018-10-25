<?php 
unset($_SESSION['token']);
echo "<script>alert('成功退出');window.location.href='./index.php?action=login'</script>";
?>
