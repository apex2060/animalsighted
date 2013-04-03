<?php
/*******************************************************************************
Title:			functions.php
Created By:		Ryan Quinlan
Created On:		02/13/2013
Purpose:		Common Site Functions
*******************************************************************************/
function drawError($field){
	if(isset($_SESSION['ERROR'][$field])){
		if($field=='site'){
			if(substr($_SESSION['ERROR']['site'], 0, 15)=='SQLSTATE[23000]'){
				echo '<div class="text-error">That username already exists.</div>';
			}else{
				echo '<div class="text-error">'.$_SESSION['ERROR'][$field].'</div>';
			}
		}else{
			echo '<div class="text-error">'.$_SESSION['ERROR'][$field].'</div>';
		}
		unset($_SESSION['ERROR'][$field]);
	}
}
function drawMsg($type, $msg){
	echo '<div class="alert alert-'.$type.'"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$msg.'</div>';
}
function setError($field, $value){
	$_SESSION['ERROR'][$field]=$value;
}

function user($attr){
	return $_SESSION['valid'][$attr];
}
function token($pie){
	$salt='fjl39ru8a8ruapjigj';
	$iterations = 10;
	$hash = crypt($pie,$salt);
	for ($i = 0; $i < $iterations; ++$i){
	    $hash = crypt($hash . $pie,$salt);
	}
	return $hash;
}

function map($lat, $lng){
	return 'http://maps.googleapis.com/maps/api/staticmap?center='.$lat.','.$lng.'&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C'.$lat.','.$lng.'&sensor=false';
}
function active($params){
	$params=split('=', $params);
	if($_GET[$params[0]]==$params[1])
		return ' active ';
}
function search($term){
	return 'https://www.google.com/search?as_st=y&tbm=isch&hl=en&as_q='.$term.'&as_epq=&as_oq=&as_eq=&cr=&as_sitesearch=&safe=images&tbs=isz:m,sur:fc&biw=1600&bih=775&sei=dABaUevIMabRiwKE9oHQBw';
}
?>