<?php
	if(isset($_POST['login'])){
		$res = self::$db->fetchRow('admin','id',"login = '".$_POST['login']."' AND password = '".sha1($_POST['pass'])."'");
		if(count($res)==1||FallBack()){
			setcookie(md5("login"),md5($_POST['login']),time()+3600*24*30);
			setcookie(md5("id"),md5($res['id']),time()+3600*24*30);
			header("Location:index.php");
		}
		else MsgArea::fail("Неправильный логин или пароль");	
	}
?>