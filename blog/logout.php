<?php
	require_once("header.php");
	if(isset($_COOKIE['login']))setcookie("login","",time()-7200);
	if(isset($_COOKIE['id'])) setcookie("id","",time()-7200);
	header("Location:index.php"); 
?>