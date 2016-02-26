<div class="row">
	<div class="col-md-6 ">
		<table class="table table-striped table-bordered">
			<tr><th>Название страницы</th></tr>
			{section loop=$pages name=i }
			<tr>
				<td><a href="index.php?view=page_editor&id={$pages[i].id}">{$pages[i].pagetitle}</a></td>
			</tr>
			{/section}
		</table>
	</div>
</div>