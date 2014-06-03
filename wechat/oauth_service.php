<?php 
var_dump($_GET);
$redir = urlencode("http://121.199.55.129/yuechang/wechat/oauth_service.php");
echo "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx81c05a579d2ab456&redirect_uri="
. $redir 
."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";

?>