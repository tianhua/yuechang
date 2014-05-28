<?php
include_once '../../Util/DB/connector.php';
class Account_DAL
{
	private $instance = NULL;
	function __construct(){
		include '../yuechang_config.php';
		$this->instance = new DBHelper($config);
    
	}
	
	public function create($username,$gender,$birthday,$openid){
		$sql_insert_user = "insert into user (name,gender,birthday,openid) values 
    ('$username', '$gender','$birthday', '$openid');";
    $this->instance->exec($sql_insert_user);
    $uid = $this->instance->lastInsertId ();
    return $uid;
	}
}
?>