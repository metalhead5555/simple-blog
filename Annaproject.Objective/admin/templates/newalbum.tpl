<form action="index.php?view=newalbum" method="POST" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
		<label for="name" class="col-md-2">Название</label>
		<div class="col-md-4">
			<input type="text" class="form-control" id="name" name="name" value="{if $mode }{$name}{/if}" required>
		</div>
	</div>
	<div class="form-group">
		<label for="cats" class="col-md-2">Категория</label>
		<div class="col-md-4">
			<select class="form-control" id="cats" name="idcat">
				{section loop=$cats name=i}
					<option value="{$cats[i].id}">{$cats[i].name}</option>
				{/section}
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="wrap" class="col-md-2">Обложка альбома</label>
		<div class="col-md-4" >
			<input type="file"  id="wrap" name="wrap" >
		{if $mode }<img src="../img/{$mainphoto}" class="img-thumbnail img-responsive">{/if}
		</div>

	</div>
	<div class="form-group">
		<label for="descr" class="col-md-2">Описание</label>
		<div class="col-md-4">
			<textarea class="form-control" rows="4" id="descr" name="descr">{if $mode }{$descr}{/if}</textarea>
		</div>
	</div>
	<!-- Submit button -->
	<div class="row">
		<div class="col-md-4 col-md-offset-2" >
			<button type="submit" name="enter" class="btn btn-md btn-primary btn-block">Сохранить</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="{$class}">
				{$msg}
			</div>
		</div>
	</div>
	<input type="hidden" name="id" value="{if $mode }{$id}{/if}">
	<input type="hidden" name="oldphoto" value="{if $mode }{$mainphoto}{/if}">
</form>