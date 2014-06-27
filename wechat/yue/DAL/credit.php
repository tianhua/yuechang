<?php
include_once '../../Util/DB/connector.php';
class Credit_DAL
{
	private $instance = NULL;
	function __construct(){
		include '../yuechang_config.php';
		$helper = new DBHelper($config);
		$this->instance = $helper->getInstance();
	}
	
	public function add($uid, $ammount, $expiration = null, $type = 0){
		$sql_insert_credit = "insert into credit (uid,amount,expiration,type) values 
    ('$uid', '$ammount','$expiration', '$type');";

    $this->instance->exec($sql_insert_credit);
    $uid = $this->instance->lastInsertId ();

    return $uid;
	}
	
	public function getUserByOpenId($openid){
		$sql_get_user = "select * from user where openid = '$openid';";
	    return $this->instance->query($sql_get_user);
	}
}
?>