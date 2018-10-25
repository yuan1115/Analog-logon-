<?php
include('./function/curl.php');
$platurl = "https://zmt.yizhuan5.com/Mediabrary/data/Platform";
$plat = _GetContent($platurl);
$plat = json_decode($plat,true);
$categoryUrl = "https://zmt.yizhuan5.com/Mediabrary/data/AuthorCategory";
$category = _GetContent($categoryUrl);
$category = json_decode($category,true);
include("./static/html/index.html");
?>
