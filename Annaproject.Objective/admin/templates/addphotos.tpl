<form action="index.php?view=addphotos" method="POST" enctype="multipart/form-data" class="form-horizontal" style="margin-bottom:10px">
	<div class="row">
		<div class="col-md-12">
			<input type="file" name="photo[]" multiple  required >
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary btn-block" name="enter">Добавить</button>
		</div>
	</div>
	<input type="hidden" name="id" value="{$id}">
</form>
<div class="{$class}">
	{$msg}
</div>	
{if $true}
<div class="row">
	{section loop=$photos name=i}
	<div class="col-xs-6 col-md-4 col-lg-3">
		<a href="#" class="thumbnail">
			<img src="{$photos[i].bigpic}" alt="" class="fixed">
		</a>
		<div class="caption">
			<a class="btn btn-danger btn-sm btn-block" href="index.php?view=addphotos&mode=del&alb={$id}&photo={$photos[i].bigpic}">Удалить
			</a>
		</div>
	</div>
	{/section}
</div>
{/if}