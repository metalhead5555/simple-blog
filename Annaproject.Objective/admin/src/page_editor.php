<?php  
	if (isset($_GET['id'])){
		$pageProps = self::$db->fetchRow('settings','pagetitle,keywords,descr,content','id='.$_GET['id']);
		self::$smarty->assign("props",$pageProps);
		self::$smarty->assign("curid",$_GET['id']);
	}
	elseif (isset($_POST['enter']) && !empty($_POST['pagetitle'])){
		self::$db->update('settings','pagetitle,keywords,descr,content',[$_POST['pagetitle'],$_POST['keywords'],$_POST['descr'],$_POST['content']],'id = '.$_POST['curid']);
		header("Location:index.php?view=page_list");
		
	} else{
		MsgArea::fail("Unknown error");
	}

?>