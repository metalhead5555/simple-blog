<?php
	if(isset($_COOKIE[md5('login')]))setcookie(md5("login"),"",time()-7200);
	if(isset($_COOKIE[md5('id')])) setcookie(md5("id"),"",time()-7200);
	header("Location:../index.php"); 
?>