$(document).ready(function() {
 
    $(document).on("click",".buttontab",function() {
        console.log(this.id);
    });

	if($(".btn-top").length > 0){
		$(window).scroll(function () {
			var e = $(window).scrollTop();
			if (e > 150) {
				var thiswidth= $(document).width() - ($('.container').offset().left + $('.container').outerWidth());
				$(".btn-top").show()
				$(".btn-top").css('right',thiswidth );
			} else {
				$(".btn-top").hide()
			}
		});
		$(".btn-top").click(function () {
			$('body,html').animate({
				scrollTop: 0
			})
		})
	}		

	$('#myCarousel').carousel({
		interval: 4000
	  })
	  
	  $('.carousel .item').each(function(){
		var next = $(this).next();
		if (!next.length) {
		  next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		
		for (var i=0;i<2;i++) {
		  next=next.next();
		  if (!next.length) {
			  next = $(this).siblings(':first');
			}
		  
		  next.children(':first-child').clone().appendTo($(this));
		}
	});

	$(document).on("click", ".header .untopmenu .buttonmenu", function () {
		$(".header .untopmenu .buttonmenu").removeClass("topbutton3-radius");
		$(this).addClass("topbutton3-radius");
	});

	$(document).on("click", ".buttontab", function () {
        var tabimage = "/front/images/" + this.id + ".png";
		$(".tabscript").css("background", "url(" + tabimage + ")");
	});

	$(document).on("click", ".tabs-menu li", function () {
        var clss = $(this).attr("data-id");
		$(this).parent("ul").children("li").removeClass("active");
		$(this).parent().parent("div").children(".block").css("display", "none");
		$(this).addClass("active");
		$("." + clss).css("display", "");
	});
});

function menuMobile(event) {
    event.classList.toggle("change");
}

$(document).ready(function() {
    $(".navbar-toggler").click(function(){
        $(".collapse").slideToggle(300);
    });   
});