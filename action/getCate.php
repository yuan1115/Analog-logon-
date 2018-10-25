<?php
include('./function/curl.php');
$categoryUrl = "https://zmt.yizhuan5.com/Mediabrary/data/AuthorCategory?CID=".$_POST['cid'];
$category = _GetContent($categoryUrl);
print_r($category);
?>

