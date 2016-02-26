<?php  
	self::$smarty->assign("mode","");
	$cats = self::$db->fetchTable('categories','name,id');
	self::$smarty->assign("cats",$cats);
	if (isset($_GET['alb']) && $_GET['mode'] == "update"){
		self::assignArray(self::$smarty,
			self::$db->fetchRow('albums','name,mainphoto,descr','id = '.$_GET['alb'])
		);
		self::assignArray(self::$smarty,array('mode'=>$_GET['mode'],
											  'id'=>$_GET['alb'])
		);
	}
	if (!empty($_POST['id']) && isset($_POST['enter'])){
		if ($_FILES['wrap']['error'] !=0){
			$name = $_POST['oldphoto']; 
		} else {
			$tmpname = time().self::validateName($_FILES['wrap']['name']);
			@unlink(IMGDIR.$_POST['oldphoto']);
			move_uploaded_file($_FILES['wrap']['tmp_name'], IMGDIR.$tmpname);
			$name = self::optimizePicture(IMGDIR.$tmpname);
		}
		$upd = self::$db->update('albums','name,mainphoto,descr,id_cat',['name',$name,'descr','idcat'],'id = '.$_POST['id']);
		if ($upd){
			header("Location:index.php?view=albums");
		} else {
			MsgArea::fail('Проблема с загрузкой фото');
		}
	} elseif (isset($_POST['enter'])) {
		if ($_FILES['wrap']['error'] == 0){
			$tmpname = time().self::validateName($_FILES['wrap']['name']);
			move_uploaded_file($_FILES['wrap']['tmp_name'], IMGDIR.$tmpname);
			$name = self::optimizePicture(IMGDIR.$tmpname);
			self::$db->insert('albums','name,mainphoto,descr,id_cat',[$_POST['name'],$name,$_POST['descr'],$_POST['idcat']]);
			header("Location:index.php?view=albums");
		} else {
			MsgArea::fail("Проблема загрузкой фото");	
		}
	}
?>