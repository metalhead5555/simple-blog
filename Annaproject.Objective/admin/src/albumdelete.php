<?php  
	if (isset($_GET['name']) && isset($_GET['photo']) && isset($_GET['alb'])){
		self::assignArray(self::$smarty,array('name' =>$_GET['name'],
											  'photo' =>$_GET['photo'],
											  'id' =>$_GET['alb']));
	}
	if (isset($_POST['enter']) && $_POST['choise']){
		$res = self::$db->fetchTable('photo','bigpic','id_album = '.$_POST['id']);
		if (count($res) != 0){
			foreach ($res as $key => $photo){
				@unlink(IMGDIR.$photo['bigpic']);				
			}
			self::$db->delete('albums','albums.id = '.$_POST['id'],'albums,photo','INNER JOIN photo ON  photo.id_album = albums.id');
		} else { 
			self::$db->delete('albums','albums.id = '.$_POST['id']);
		}
		@unlink($_POST['oldphoto']);
		header("Location:index.php?view=albums");	
	}
?>