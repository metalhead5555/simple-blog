<?php  
	if(isset($_POST['enter'])){
		if($_POST['pass']==$_POST['pass2']){
			self::$db->update('admin','login,sha1^password',[$_POST['login'],$_POST['pass']]);
			MsgARea::success("Данные успешно изменены!");
		}
		else MsgArea::fail("Пароли не совпадают!");
	}
?>