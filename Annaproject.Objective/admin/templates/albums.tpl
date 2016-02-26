<div class="btn-toolbar" role="toolbar">
	<div class="btn-group">
		<a  class="btn btn-default" href="index.php?view=newalbum&mode=new" >Создать новый альбом</a>
		<button  class="btn btn-primary">
			<a href="index.php?view=newalbum" class="glyphicon glyphicon-pencil white "></a>
		</button>
	</div>
	<div class="btn-group">
		<a class="btn btn-default" href="index.php?view=albums">Последние записи:</a>
		<button  class="btn btn-primary">
			<a href="index.php?view=albums" class="glyphicon glyphicon-circle-arrow-down white"></a>
		</button>
	</div>
	<div class="btn-group">
		<div class="btn-group">
  			<button type="button" class="btn btn-default">По категории:</button>
  				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
 				<span class="caret"></span>
 			</button>
		<ul class="dropdown-menu" role="menu">
			{section loop=$catname name=i}
			<li><a href="index.php?view=albums&idcat={$catname[i].id}">{$catname[i].name}</a></li>
        	{/section}
    	</ul>
    	</div>
	</div>
	
</div>
<br>
<div class="row">
	{section loop=$albums name=i}
	<div class="col-xs-6 col-md-4 col-lg-3">
		<div class="thumbnail">
			<img src="{$albums[i].mainphoto}" alt="" class="fixed">
			<div class="caption">
				<h4 class="text-center bg-info">{$albums[i].name}</h4>
				<a class="btn btn-primary btn-sm btn-block" href="index.php?view=newalbum&mode=update&alb={$albums[i].id}">Редактировать</a>
				<a href="index.php?view=addphotos&alb={$albums[i].id}" class="btn btn-success btn-sm btn-block">Управление фото</a>
				<a class="btn btn-danger btn-sm btn-block" href="index.php?view=albumdelete&alb={$albums[i].id}&name={$albums[i].name}&photo={$albums[i].mainphoto}">Удалить</a>
			</div>
		</div>
	</div>
	{/section}
</div>
