<?php  
	$res = self::$db->fetchTable('categories','name,id');
	self::$smarty->assign('catname',$res);
	$albums = isset($_GET['idcat'])
		? self::$db->fetchTable('albums','id,name,mainphoto',"id_cat = ".$_GET['idcat'],'','id DESC') 
		: self::$db->fetchTable('albums','id,name,mainphoto','','','id DESC',12);
	for ($i=0; $i < count($albums); $i++){ 
		$albums[$i]['mainphoto'] = IMGDIR.$albums[$i]['mainphoto'];
	}
	self::$smarty->assign('albums',$albums);
	//var_dump($albums);
?>