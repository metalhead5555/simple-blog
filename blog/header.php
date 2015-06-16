<?php
	$dbc= new Mysqli("localhost","root","","blog") or die("DB Connection error");
	mysqli_query($dbc,"SET NAMES UTF8");
	function protectField ($field){
		global $dbc;
		return mysqli_real_escape_string($dbc,trim(
			isset($_GET[$field]) ? $_GET[$field] : $_POST[$field]
		));
	}  
	function getPage(){
		$pos = strrpos($_SERVER['PHP_SELF'],"/");
		$tmpname = substr($_SERVER['PHP_SELF'],$pos+1);
		return str_replace(".php", "", $tmpname);
	}
	$content="";
	$class="text-center ";
	function success($msg){
		$GLOBALS["content"]=$msg;
		$GLOBALS['class'].=" alert alert-success";
	}
	function fail($msg){
		$GLOBALS['content']=$msg;
		$GLOBALS['class'].=" alert alert-danger";
	}
	$page=getPage();
	if(!file_exists("templates/".$page.".tpl"))$page="";

	define('SMARTY_DIR',"libs/");
	require(SMARTY_DIR."Smarty.class.php");
	$mainSmarty=new Smarty();
	define('IMGDIR',"img/");
	$guestAuth = false;
	$userAuth = false;
	if(isset($_COOKIE['id'])&&isset($_COOKIE['login'])){
		$mainSmarty->assign("guestAuth",false);
		$mainSmarty->assign("authorized",true);
		$userAuth = true;
	} elseif(isset($_COOKIE['id'])&&!isset($_COOKIE['login'])){
		$guestAuth = true;
		$mainSmarty->assign("authorized",false);
		$mainSmarty->assign("guestAuth",true);
	} else {
		$mainSmarty->assign("guestAuth",false);
		$mainSmarty->assign("authorized",false);
	}
?>