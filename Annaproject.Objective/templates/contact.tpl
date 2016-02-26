<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 ">
		<address class="text-center pad" >
  			{$content}
		</address>
		<ul class="soc">
			<div class="row">
			    <div class="col-md-3 col-sm-3 col-xs-3 ">
			    	<li class="text-center"><a target="_blank" class="soc-vkontakte" href="http://vk.com/id16109061"></a></li>
			    </div>
			     <div class="col-md-3 col-sm-3 col-xs-3">
			     	<li><a target="_blank" class="soc-instagram" href="https://instagram.com/anna_vyalova/"></a></li>
			     </div>
			     <div class="col-md-3 col-sm-3 col-xs-3">
			     	<li><a target="_blank" class="soc-youtube" href="https://www.youtube.com/channel/UCzpzVZvfdBCwlbetJ1qCEhA"></a></li>
			     </div>
			    <div class="col-md-3 col-sm-3 col-xs-3">
			    	<li class="last"><a target="_blank" class="soc-facebook soc-icon-last" href="https://www.facebook.com/annavialova"></a></li>
			    </div>
			</div>
		</ul>
		<br>
		<div class="{$class} text-center" id="msg">
			{$msg}
		</div>
		<div  class=" btn btn-block" data-toggle="collapse"  data-target="#postform" id="btn-clps" style="margin-bottom:10px">
          	<p class="text-center">Contact with me</p><span class="glyphicon glyphicon-chevron-down"></span>
        </div>
        <!-- Collapse button-->
      	
     	<div id="postform" class="collapse on">

        <!-- Massege form-->
	        <form action="index.php?view=contact" method="POST" class="form-horizontal">
	            <div class="form-group">
	              <label for="email" class="col-md-4">Ел.почта</label>
	              <div class="col-md-8">
	                <input type="email" class="form-control" id="email" name="email"  required >
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="subject" class="col-md-4">Тема</label>
	              <div class="col-md-8">
	                <input type="text" class="form-control" id="subject" name="subject"  required>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="col-md-12">
	                <textarea name="content" id="content"  rows="10" class="form-control" autofocus ></textarea>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="col-md-12">
	                <button class="btn btn-default btn-block" type="submit" name="sendmail">Send</button>
	              </div>
	            </div>
	        </form>
        <!-- Massege form-->
	</div>
</div>
</div>