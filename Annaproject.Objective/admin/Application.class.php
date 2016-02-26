<?php
	require('ExtendedMysqli.class.php');
	/**
	 * @author Petrenko Yaroslav
	 * @package Application
	 */
	class Application {
		/**
		 * Current template
		 * @var string
		 */
		static private $view = 'index';
		/**
		 * Database delegate
		 * @var object
		 */
		static private $db;
		/**
		 * Smarty delegate
		 * @var object
		 */
		static private $smarty;
		/**
		 * Main method
		 * @return <void>
		 */
		static public  function Start(){
			if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0')
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0')
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0'))
			{
				header("Location:badbrowser.php");
			} elseif (preg_match("/admin$/",getcwd())
					  && (!isset($_COOKIE[md5('login')])
					  || !isset($_COOKIE[md5('id')]))
					  && $_GET['view'] !='login')
			{ 
				header("Location:index.php?view=login");
			} 
			self::$smarty = new Smarty();
			self::$db = new ExtendedMysqli(DBNAME);
			if (isset($_GET['view'])){
				self::$view = $_GET['view'];
				self::useSrcFile();
			}
			self::$smarty->assign('view',self::$view);
			$res = self::$db->fetchRow('settings','pagetitle,keywords,descr,content',"filename = '".self::$view."'");
			if (!empty($res)){
				self::assignArray(self::$smarty,$res);
			} else {
				self::assignArray(self::$smarty,array('keywords'=>'',
													  'descr'=>''));
			}

			self::$smarty->assign('catname',
				self::$db->fetchTable('categories','name,id'));
			
			self::assignArray(self::$smarty,
				MsgArea::getCurrentValues());

			self::$smarty->display('main.tpl');
			self::$smarty->clearAllAssign();

		}
		/**
		 * Create main constants
		 * @param <array> $constants
		 * @return <void>
		 */
		static public function Configurate($constants){
			foreach ($constants as $key => $value){
				define(strtoupper($key),$value);	
			}
		}
		/**
		 * Findand and includ file, which name = $view
		 * @return <void>
		 */
		static private function useSrcFile(){
			if (file_exists(SRCDIR.self::$view.'.php') && self::$view!='index'){
				require SRCDIR.self::$view.'.php';	
			}
			elseif (!file_exists(SRCDIR.self::$view.'.php')
					&& !self::$smarty->templateExists(self::$view.'.tpl')){
				die(header('Location:notfound.php'));
			}
				
		}
		/**
		 * Applied assign() to each element of the array individually
		 * @param <object> $obj 
		 * @param <array> $array target
		 * @return <boolean>
		 */
		static private function assignArray(Smarty $obj,$array){
			if (count($array) != count($array,true)){
				foreach ($array  as $subArray){
					foreach ($subArray as $key => $value){
						$obj->assign($key,$value);
					}
				}
			} else {
				foreach ($array as $key => $value){
					$obj->assign($key,$value);			
				}
			}
			return true;
		}
		/**
		 * Replace all cyrillic symbols from the string
		 * @param <string> $name
		 * @return <string>
		 * @example timestamp.name.png
		 */
		static public function validateName($name){
			return time().preg_replace_callback(
				"/[а-яА-ЯёЁіІїЇєЄ]/u",
				function(){
					return chr(rand(97,122));
				}, 
				$name
			);
		}
		/**
		 * Crop and rename picture
		 * @param <resource> $picture path to file
		 * @return <string> new picture name
		 */
		static public function optimizePicture($picture){
			if (file_exists($picture)){
				$size = getimagesize($picture);
				$width = 400;
				$K = $size[0]/$size[1];
				$height = $width/$K;
				$res = imagecreatetruecolor($width,$height);
				imagecopyresampled($res,$size[2] <=2
					?imagecreatefromjpeg($picture)
					:imagecreatefrompng($picture),
					0,0,0,0,$width,$height,$size[0],$size[1]);
				$oldname=$picture;
				$name=preg_replace('/[\.\w\d\\/]+[^\d\s\w\.\-\w{3,4}$]+/i','resized',$picture);
				$size[2]<3
					?imagejpeg($res,IMGDIR.$name)
					:imagepng($res,IMGDIR.$name);
				@unlink($oldname);
				imagedestroy($res);
				return $name;
			}
		}
	}

	class MsgArea{
		/**
		 * Contains some message
		 * @var string
		 */
		static private $content="";
		/**
		 * Contains some css class
		 * @var string
		 */
		static private $class="text-center ";

		/**
		 * Change current css class and message
		 * @param <string> $msg
		 * @return <void>
		 */
		static public function success($msg){
			self::$content = $msg;
			self::$class.=" alert alert-success";
		}

		/**
		 * Change current css class and message
		 * @param <string> $msg
		 * @return <void>
		 */
		static public function fail($msg){
			self::$content = $msg;
			self::$class.=" alert alert-danger";
		}
		/**
		 * Returns current $class and $content
		 * @param <string> $msg
		 * @return <array>
		 */
		static public function getCurrentValues(){
			return array('msg'=>self::$content, 'class'=>self::$class);
		}
	}
?>