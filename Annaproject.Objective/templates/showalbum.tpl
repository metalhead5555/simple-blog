{if $set}
<div class="row">
	<div class="col-md-10">
		<div id="gallery" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#gallery" data-slide-to="0" class="active"></li>
				{for $i=1 to $count step 1}
				<li data-target="#gallery" data-slide-to="{$i}"></li>
				{/for}
			</ol>
			<div class="carousel-inner alb-car">
				<div class="item active">
					<img src="{$pics[0]}" alt="" >
				</div>
				{section loop=$pics name=i start=1}
				<div class="item">
					<img src="{$pics[i]}" alt="">
				</div>
				{/section}
				<a class="left carousel-control" href="#gallery" data-slide="prev">
      				<span class="glyphicon glyphicon-chevron-left"></span>
   				</a>
    			<a class="right carousel-control" href="#gallery" data-slide="next">
     				<span class="glyphicon glyphicon-chevron-right"></span>
    			</a>
			</div>
		</div>
	</div>
	<div class="col-md-2 descr ">
		<h3 class="text-center"><strong>{$alb_name}</strong></h3>
		<div class="alb-descr">
			<p class="text-left">{$alb_descr}</p>
		</div>
	</div>
</div>
{else}
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-warning info">
			<h4 class="text-center ">
				В альбоме пока что нет фотографий.
			</h4>
		</div>
	</div>
</div>
{/if}