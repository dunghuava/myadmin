<?php 

function replace_value ($value){
	if (isset($value)){
		return $value;
	}
	return '';
}
function dateinsert(){
	return date('Y-m-d h:i:s');
}
function format($num,$str=''){
	return number_format($num).' '.$str;
}
function cutstr($text,$len){
	if (strlen($text)<=$len)
		return $text;
	else
		return substr($text,0,$len).'<a title="Xem thêm">[...]</a>';
}
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function create_slug($string){
   $slug 	=	preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   $slug 	= 	strtolower($slug);
   $slug 	=	trim($slug,'-');
   return $slug;
}

function dd ($data,$die=false){
	echo '<pre>';
		print_r($data);
	echo '</pre>';
	if($die){
		die;
	}
}
function resizeImg ($image,$w=100,$h=100,$zc=2){
	if (!file_exists('upload/images/'.$image) || empty($image)){
		$image='nophoto.png';
	}
	return base_url('thumb.php?src='.base_url('upload/images/'.$image.'&w='.$w.'&h='.$h.'&zc='.$zc));
}
function getLink($arr_permission,$link,$is_admin){
	$next_link=base_url($link);
	if(in_array($next_link,$arr_permission) || $is_admin==1){
		return base_url().$link;
	}
	return 'javascript:void(0)';
}

$vi_language=array(
	'btn_cancel'=>'Thoát',
	'btn_save'=>'Lưu',
);
$us_language=array(
	'btn_cancel'=>'Close',
	'btn_save'=>'Save',
);