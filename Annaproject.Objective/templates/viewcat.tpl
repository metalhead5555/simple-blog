{if $albums}
<div class="row pad">	
	{section loop=$albums name=i}
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<a href="index.php?view=showalbum&id={$albums[i].id}" class="thumbnail">
				<img src="img/{$albums[i].mainphoto}" alt="" class="img-responsive  fixed" >
			</a>
		</div>
	{/section}
</div>
	<ul class="pager">
	  	<li class="previous {$prev}">
	  		<a href="index.php?view=viewcat&pg={$pg-1}&idcat={$cat}"><span class="glyphicon glyphicon-chevron-left"></span></a>
	 	</li>
	  	<li class="next {$next} ">
	  		<a href="{if !$next }index.php?view=viewcat&pg={$pg+1}&idcat={$cat}{/if}"><span class="glyphicon glyphicon-chevron-right"></span></a>
	  	</li>
	</ul>
{else}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-warning info">
				<h4 class="text-center ">
					Ни один альбом пока что не создан.
				</h4>
			</div>
		</div>
	</div>
{/if}
