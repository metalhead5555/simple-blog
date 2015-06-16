<?php  
	require("header.php");
	if(isset($_POST['enter'])){
		$query="SELECT email FROM users WHERE email = '".$_POST['email']."'";
		$res = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
		if(mysqli_num_rows($res)>0) fail("Даний імейл вже зареєстрований ");
		elseif($_POST['pass']==$_POST['pass1']){
			$query="INSERT INTO users (login,email,pass) VALUES ('".protectField("login")."','".protectField("email")."','".SHA1(protectField("pass"))."')";
			mysqli_query($dbc,$query) or die($query);
			header("Location:index.php");
		} else fail("Не відповідні паролі");
	}

	$mainSmarty->assign("content",$content);
	$mainSmarty->assign("class",$class);
	$mainSmarty->display("reg.tpl");

?>