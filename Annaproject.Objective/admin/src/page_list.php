<?php  
	$pages = self::$db->fetchTable('settings','id,pagetitle');
	self::$smarty->assign("pages",$pages);
?>