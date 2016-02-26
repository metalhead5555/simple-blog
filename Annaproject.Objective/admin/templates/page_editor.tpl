<form action="index.php?view=page_editor" method="POST" class="form-horizontal">
	{if $curid}
	<div class="form-group">
		<label for="pagetitle" class="col-md-2">Название</label>
		<div class="col-md-4">
			<input type="text" class="form-control" id="pagetitle" name="pagetitle" value="{$props.pagetitle}" required>
		</div>
	</div>
	<div class="form-group">
		<label for="keywords" class="col-md-2">Ключевые слова(для поисковых систем)</label>
		<div class="col-md-4">
			<textarea class="form-control" rows="4" id="keywords" name="keywords">{$props.keywords}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="descr" class="col-md-2">Описание(для поисковых систем)</label>
		<div class="col-md-4">
			<textarea class="form-control" rows="4" id="descr" name="descr">{$props.descr}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="content" class="col-md-2">Содержимое страницы(для удобства использовать полноэкранную версию)</label>
		<br >
		<div class=" col-md-4">
			<textarea class="form-control"  id="content" name="content">{$props.content}</textarea>
			<script>CKEDITOR.replace( 'content' )</script>
		</div>
	</div>
	<!-- Submit button -->
	<div class="row">
		<div class="col-md-4 col-md-offset-2" >
			<button type="submit" name="enter" class="btn btn-md btn-primary btn-block">Сохранить</button>
		</div>
	</div>
	<input type="hidden" name="curid" value="{$curid}">
	{/if}
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="{$class}">
				{$msg}
			</div>
		</div>
	</div>
</form>
<!-- {literal}<script>window.onload = function(){CKEDITOR.replace( 'content' );}</script>{/literal} -->
