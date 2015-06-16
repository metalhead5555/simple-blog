<?php 
	require("header.php");
	if(isset($_COOKIE['id'])) setcookie("id","",time()-7200);
	if(isset($_POST['enter'])){
		$query="SELECT id,login FROM users WHERE email = '".$_POST['email']."' AND pass = '".SHA1($_POST['pass'])."'";
		$res = mysqli_query($dbc,$query) or die($query);
		if(mysqli_num_rows($res)==1){
			$row=mysqli_fetch_array($res);
			setcookie("id",$row['id'],time()+3600*24*30);
			setcookie("login",$row['login'],time()+3600*24*30);
		}
		$login=$row['login'];
		header("Location:index.php");
	}
 ?>