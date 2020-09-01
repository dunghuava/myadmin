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
function resizeImg ($image='',$w=100,$h=100,$zc=2){
	if (!file_exists('upload/images/'.$image) || empty($image)){
		$image='nophoto.png';
	}
	return base_url('thumb.php?src='.base_url('upload/images/'.$image.'&w='.$w.'&h='.$h.'&zc='.$zc));
}
function getLink($link,$is_admin){
	$next_link=base_url($link);
	if($is_admin==1){
		return base_url().$link;
	}
	return 'javascript:void(0)';
}

function fullAddress(){
	return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
function getID($alias){
	return end(explode('-',$alias));
}
$vi_language=array(
	'btn_cancel'=>'Thoát',
	'btn_save'=>'Lưu',
);
$us_language=array(
	'btn_cancel'=>'Close',
	'btn_save'=>'Save',
);

function send_mail($tomail, $subject, $body){
  $body = mb_convert_encoding($body, "UTF-8","UTF-8");
  $from_mail = 'truongthuan20041997@gmail.com';
  $from_name = 'Gianha.vn';
  $header  = "Return-Path: $from_mail\n";
  $header .= "From:" . mb_encode_mimeheader($from_name) . "<$from_mail>\n";
  $header .="MIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n";
  $header .= "Reply-To: $from_mail\n";
  $header .= "BCC: $from_mail\n";
  return mb_send_mail($tomail, $subject, $body, $header);
} 

function check_isMobile() {
    $is_mobile = '0';
    if(preg_match('/(android|iphone|ipad|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
        $is_mobile=1;
    if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))
        $is_mobile=1;
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
    if(in_array($mobile_ua,$mobile_agents))
        $is_mobile=1;
    if (isset($_SERVER['ALL_HTTP'])) {
        if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0)
            $is_mobile=1;
    }
    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0)
        $is_mobile=0;
    return $is_mobile;
}