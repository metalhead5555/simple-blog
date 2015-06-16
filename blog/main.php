<?php
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0')||strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0')
	||strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0')) header("Location:badbrowser.php");
	//||strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0')//for IE9, if you want

	$mainSmarty->assign("content",$content);
	$mainSmarty->assign("class",$class);
	$mainSmarty->assign("userlogin",@$_COOKIE['login']);
	$mainSmarty->assign("userid",@$_COOKIE['id'] ? $_COOKIE['id'] : "empty");
	$mainSmarty->assign("page",$page);
	$mainSmarty->assign("content",$content);
	$mainSmarty->display("main.tpl");
	mysqli_close($dbc);  
?>