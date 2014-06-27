<?php 
include("wechat.class.php");
if(!isset($_GET['code']))
die;
$options = array(
		'token'=>'2whxNVF5jt', //填写你设定的key
		'appid'=>'wx81c05a579d2ab456', //填写高级调用功能的app id, 请在微信开发模式后台查询
		'appsecret'=>'fe2290189dc4815c4c84dcb4ecc3d41f', //填写高级调用功能的密钥

);
$weObj = new Wechat($options);
//$weObj->valid();
$code = $_GET['code'];
$json = $weObj->getOauthAccessToken();
$openid = $json['openid'];
setcookie('YUECHANG_OPENID',$openid);
header('Location: http://121.199.55.129:8000/user/register?openid='.$openid);//yue/register.php
?>