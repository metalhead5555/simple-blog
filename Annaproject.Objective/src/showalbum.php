<?php  
	$set = false;
	$res = self::$db->fetchTable('photo','bigpic,albums.descr,albums.name',"id_album = ".$_GET['id'],"LEFT JOIN albums ON albums.id = photo.id_album");
	if($res){
		$set = true;
		foreach ($res as $key => $value)
			$pics[]=IMGDIR.$value['bigpic'];
		$albName = strtoupper($res[0]['name']);
		self::$smarty->assign("pics",$pics);
		self::assignArray(self::$smarty,array('alb_name'=>$albName,
											  'alb_descr'=>$res[0]['descr'],
											  'pagetitle'=>$albName,
											  'count'=>count($pics)-1));
	}
	self::$smarty->assign("set",$set);
?>