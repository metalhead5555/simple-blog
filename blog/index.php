<?php
	require("header.php");
	$where = true;
	$mainSmarty->assign("upd",false);
	function refresh($skip,$count,$where){
		global $dbc;
		$query="SELECT post.id,post.id_author AS authorid ,post.content,post.pub_date,post.header,users.login FROM post LEFT JOIN users ON post.id_author = users.id WHERE $where  ORDER BY post.id DESC  LIMIT $skip,$count";
		$res = mysqli_query($dbc,$query) or die($query);
		$posts=array();
		while($row = mysqli_fetch_array($res)){
			$posts[]=array('postid'=>$row['id'],'authorid'=>$row['authorid'],'content'=>$row['content'],'pub_date'=>$row['pub_date'],'login'=>$row['login'] ? $row['login'] : "",'header'=>$row['header']);
		}
		return $posts;
	}
	/*For pager*/
		$postCount = 6;
		if(empty($_GET['pg'])){
			$activePage = 1;
			$mainSmarty->assign("pg",$activePage);
		} else {
			$activePage = $_GET['pg'];
			$mainSmarty->assign("pg",$activePage);	
		}
		$skip=($activePage -1)*$postCount;
		$query="SELECT id FROM post ";
		$res=mysqli_query($dbc,$query) or die($query);
		$countDBRows = mysqli_num_rows($res);
		$countPages=ceil($countDBRows/$postCount);
	/*For pager */

	/* Search part*/
	if(isset($_POST['searchRequest'])){
		if($matches = preg_split("/[,\.' ']+/",$_POST['searchRequest'])){
			foreach ($matches as $word) $result[] = "post.header OR post.content LIKE '%$word%'";
			$where = implode(" OR ",$result);
		}
		else $where = "post.header OR post.content LIKE '%".$_POST['searchRequest']."%'";
		if(empty(refresh($skip,$postCount,$where))) fail("Немає результатів пошуку");
	}
	/* Search part*/

	/* Delete part*/
	if(@$_GET['op']=="del"&&isset($_GET['id'])){
		$query="DELETE FROM post WHERE id =".$_GET['id'];
		mysqli_query($dbc,$query) or die($query);
	}
	/* Delete part*/

	/* Update part*/
	if(@$_GET['op']=="upd"&&isset($_GET['id'])){
		$query = "SELECT header,content FROM post WHERE id = ".$_GET['id'];
		$res = mysqli_query($dbc,$query) or die($query);
		$row = mysqli_fetch_array($res);
		$mainSmarty->assign("curid",$_GET['id']);
		$mainSmarty->assign("curpost",$row);
		$mainSmarty->assign("upd",true);
	}
	/* Update part processing */
	if(isset($_POST['addpost'])&&!empty($_POST['content'])&&isset($_POST['curid'])){
		$query="UPDATE post SET header = '".protectField("header")."', content = '".protectField("content")."', pub_date = '".date("Y-m-d H:i:s")."' WHERE id = ".$_POST['curid'];
		mysqli_query($dbc,$query) or die(mysqli_error($dbc));
		header("Location:index.php");
	}
	/* Update part*/

	/* Insert part*/
	elseif(isset($_POST['addpost'])&&!empty($_POST['content'])){
		if(!$userAuth||!$guestAuth){
			$query="INSERT INTO users (login) VALUES ('".protectField("name")."')";
			mysqli_query($dbc,$query) or die($query);
			$authId = mysqli_insert_id($dbc);
			setcookie("id",$authId,time()+3600*24*30);
			//setcookie("login",protectField("name"),time()+3600*24*30);
		}
		$author = isset($_COOKIE['id']) ? $_COOKIE['id'] : $authId;
		$query = "INSERT INTO post (header,id_author,content,pub_date) VALUES ('".protectField("header")."',$author,'".$_POST['content']."','".date("Y-m-d H:i:s")."')";
		mysqli_query($dbc,$query) or die(mysqli_error($dbc));
		header("Location:index.php");
	}
	/* Insert part*/
	elseif(isset($_POST['addpost'])&&empty($_POST['content'])) fail("Обов'язкові поля не заповнені");
	$mainSmarty->assign("posts",refresh($skip,$postCount,$where));
	$activePage==1 ? $mainSmarty->assign("prev","disabled"): $mainSmarty->assign("prev","");
	$activePage>=$countPages ? $mainSmarty->assign("next","disabled"): $mainSmarty->assign("next","");
	
	require_once("main.php");
?>