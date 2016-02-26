<?php  
	$id = isset($_GET['alb'])
		? $_GET['alb'] 
		: $_POST['id'];
	self::$smarty->assign("id",$id);
	self::$smarty->assign("true",false);
	if (isset($_POST['enter'])){
		foreach ($_FILES['photo']['name'] as $i => $v) {
			if ($_FILES['photo']['error'][$i]==0){
				$name = self::validateName($v);
				move_uploaded_file($_FILES['photo']['tmp_name'][$i],IMGDIR.$name);
				self::$db->insert('photo','bigpic,id_album',[$name,$id]);
			} else { 
				switch ($_FILES['photo']['error'][$i]){
					case 1: 
						MsgArea::fail('Размер файла превышает допустимое значение');
						break;
					case 2:
						MsgArea::fail('Размер файла превышает допустимое значение');
						break;
					case 3:
						MsgArea::fail('Не удалось загрузить часть файла');
						break;
					case 4:
						MsgArea::fail('Файл не был загружен');
						break;
					case 6:
						MsgArea::fail('Отсутствует временная папка.');
						break;
					case 7:
						MsgArea::fail('Не удалось записать файл на диск.');
						break;
					case 8:
						MsgArea::fail('PHP-расширение остановило загрузку файла.');
						break;
					default:
						MsgArea::fail('Неизвестная ошибка');
				}
			}
			self::$smarty->assign("true",true);
		}
	}
	elseif (@$_GET['mode'] == "del" && isset($_GET['photo'])){
		self::$db->delete('photo',"bigpic = '".preg_replace("/^\.\.\/?(\w+\/)+/i",'',$_GET['photo']."'"));
		@unlink($_GET['photo']);
	}
	$photos = self::$db->fetchTable('photo',' bigpic,id','id_album = '.$id);
	if(count($photos)>0){
		self::$smarty->assign("true",true);
		for ($i=0; $i < count($photos); $i++){ 
			$photos[$i]['bigpic'] = IMGDIR.$photos[$i]['bigpic'];
		}
		self::$smarty->assign("photos",$photos);
	}
?>