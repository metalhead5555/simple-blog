$(document).ready(function(){
	var imgDir = "img/main/";
	function createPicArray(){
		var pics = new Array();
		for(var i=0;i<arguments.length;i++){
			pics.push(imgDir+arguments[i]+".jpg");
		}
		return pics;
	}
	$(".slide-wrap").each(function(i){
		pics = createPicArray("one","two","third","four");
		$(this).attr("src",pics[i]);
	});
	$("#slideshow").carousel({
		interval: 4000,
		pause: "none",

	});
	$("#gallery").carousel({
		interval:false
	});
	var i=1;
	$('#btn-clps').click(function (){
		//console.log(i+"--"+i*45);
		var angle = 180;
		$(this).children("span").css({
			"transform":"rotate("+i++ * angle+"deg)",
			"transition":"all .5s"
		});
	});
	$(".about").find('img').addClass("img-responsive img-thumbnail");
	var $self = $("div#msg");
	if($self.hasClass("alert"))
		setTimeout(function(){
			$self.slideToggle();
		} ,2000);
});