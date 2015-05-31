$(document).ready(function(){
	$( "#main" ).animate({
		    opacity: 1
		}, 300);

	$('#header a').click(function(){
		var a_href = $(this).attr('href');
		$( "#main" ).animate({			
		    opacity: 0
		  }, 400, function() {
		    	window.location.href = a_href;
		  });
		return false;
	})


	$('.admin_news_list .del').click(function(){
		var a_href = $(this).attr('href');
		$('.popup').fadeIn(300, function(){
			$('.del_window').show(200);
		});	
		$('.del_window .del').click(function(){
			window.location.href = a_href;
		});
		$('.del_window .cancel').click(function(){
			$('.popup').fadeOut(200);
			$('.del_window').fadeOut(200);
		});
		$('.popup').click(function(){
			$('.popup').fadeOut(200);
			$('.del_window').fadeOut(200);
		});
		return false;
	});
})