<?php 
include('./function/curl.php');
if($_POST){
	$list = $_POST;
	$i = 0;
	$data = array();
	$data['PageIndex'] = isset($list['PageIndex'])?$list['PageIndex']:1;
	$data['PageSize'] = 15;
	$data['type'] = 1;
	$data['CID'] = $list['CID'];
	$data['OrderBy'][0]['Name'] = $list['OrderBy'][0]['Name'];
	$data['OrderBy'][0]['OrderByType'] = 2;
	foreach ($list['where'] as $k => $v) {
		if($v['Value']>0){
			$data['where'][$i] = $v;
			$i++;
		}
	}
	$data['where'][$i]['Name'] = 'HMCTDate';
	$data['where'][$i]['Symbol'] = 5;
	$data['where'][$i+1]['Name'] = 'HMCTDate';
	$data['where'][$i+1]['Symbol'] = 6;
	if($list['HMCTDate']>0){
		$data['where'][$i]['Value'] = date('Y-m-d 00:00',time()-($list['HMCTDate']*60*60*24));
		$data['where'][$i+1]['Value'] = date('Y-m-d 00:00');
	}else{
		$data['where'][$i]['Value'] = date('Y-m-d 00:00',time()-($list['HMCTDate']*60*60*24*7));
		$data['where'][$i+1]['Value'] = date('Y-m-d 00:00');
	}
	$listUrl = "https://zmt.yizhuan5.com/Mediabrary/data/HotMContent";
	$list = getDatalogin($listUrl,$data);
	print_r($list);
}
?>
