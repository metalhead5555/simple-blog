$(window).load(function(){
	CKEDITOR.replace("content");

	var i=1;
	if($('#info').hasClass("alert-danger")||($('#content').val()!="")){ 
		$('#postform').addClass("in");
		$('span.glyphicon-plus').css({
			"transform":"rotate(45deg)",
			"transition":"all .5s"
		});
		i++;
	}

	$('#btn-clps').click(function (){
		//console.log(i+"--"+i*45);
		var angle = 45;
		$(this).children().css({
			"transform":"rotate("+i++ * angle+"deg)",
			"transition":"all .5s"
		});
	});

	$('.hide-post').click(function(){
		$(this).parent().parent().parent().slideUp();
	});
	$('form').keydown(function(e){
 		if(e.which == "13")
 			$(this).parent().submit();
	 });
})
