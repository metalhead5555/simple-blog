<?php  
	$albPerPage = 12;
	if(empty($_GET['pg']))
		$activePage = 1;
	else
		$activePage = $_GET['pg'];
	self::$smarty->assign("pg",$activePage);
	$skip=($activePage -1)*$albPerPage;
	$countDBRows = self::$db->getRowsCount('albums','id',"id_cat = ".$_GET['idcat']);

	$countPages=ceil($countDBRows/$albPerPage);
	self::$smarty->assign("cat",$_GET['idcat']);
	self::$smarty->assign('albums',self::$db->fetchTable('albums','id,name,mainphoto',"id_cat = '".$_GET['idcat']."'",'','id DESC',"$skip,$albPerPage"));
	$activePage ==1 
		? self::$smarty->assign("prev","disabled")
		: self::$smarty->assign("prev","");
	$activePage >=$countPages 
		? self::$smarty->assign("next","disabled")
		: self::$smarty->assign("next","");
?>