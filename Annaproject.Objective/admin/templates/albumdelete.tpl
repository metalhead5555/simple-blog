<div class="row">
	<div class="col-md-4 col-md-offset-4 alert alert-warning" style="margin-bottom:0">
		<h5 class="text-center">Вы действительно хотите удалить <strong>{$name}</strong>  и его содержимое?
		</h5>
	</div>
</div>
<form action="index.php?view=albumdelete" method="POST" class="form-horizontal">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="radio  radio-danger">
					    <input type="radio" name="choise" id="yes" value="yes" required checked>
					    <label for="yes">Да</label>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="radio  radio-primary">
					    <input type="radio" name="choise" id="nope" value="no" required >
					    <label for="nope">Нет</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" name="enter">Подтвердить</button>
			</div>
		</div>
	</div>
	<input type="hidden" name="id" value="{$id}">
	<input type="hidden" name="oldphoto" value="{$photo}">
</form>
