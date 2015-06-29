var curr_time = 0;
$(document).ready(function(){
	$(window).unload(function(){
      console.log("Событие unload было вызвано!");
   });
	//update chat
	chatUpdateInt = setInterval( function(){
		var curr_id = window.location.href;
		curr_id = curr_id.split('/');
		$.get( "/chat_api/get_time?curr_id="+curr_id[4], function(data){
			data = JSON.parse(data);

			var wr_val;
			if($('#new_msg').val()=='')
	   			wr_val = 0;
			else
				wr_val = 1;		
			//console.log(data[0]);
			$.post("/chat_api/write/"+curr_id[4], 
   				{ 
   					id: curr_id[4],
   					login: data[1],
   				  	value: wr_val 
   				} );


			if(data[0] > curr_time){
				chatUpdate();
				curr_time = data[0];
			}

		} );



		$.get( "/chat_api/check_write?curr_login="+$( "#username" ).val()+"&id="+curr_id[4], function(data){
			//$('.is_write').empty();
			console.log(data);
			if(data == 1){
				$('.is_write img').show();
				$( ".is_write img" ).animate({
				    opacity: 0,
				    marginLeft: "+50",
				  }, 2000, function() {
			  	});
			  	$( ".is_write img" ).animate({
				    opacity: 1,
				    marginLeft: "0",
				  }, 0, function() {
			  	});
			}
			else{
				$('.is_write img').hide();
				$( ".is_write img" ).stop();
				$( ".is_write img" ).css('marginLeft', '0');
				$( ".is_write img" ).css('opacity', '1');
			}

		} );

	}, 100 );

	$('#new_msg').bind("enterKey", function(e){
		msg = $('#new_msg').val();
		$('#new_msg').val('');

		name = $('#username').val();

		var curr_id = window.location.href;
		curr_id = curr_id.split('/');

   		if( msg != '' ){
   			$.post("/chat_api/add/"+curr_id[4], 
   				{ username: name,
   				  message: msg } );
   		}

	});


	$('#new_msg').keyup(function(e){
	    if(e.keyCode == 13)
	    {
	        $(this).trigger("enterKey");
	    }
	});
	$( "#username" ).change(function() {
 		login = $( "#username" ).val();
 		if(login.length == 0){
 			$('#add_msg').append('Нельзя ввести пустой логин');		
 		}
 		else{
 		$.post("/chat_api/update_login", 
   				{ new_login: login
   				 });   	
   		}	

	});

})
window.onload = function () {
	chatUpdate();
	//setTimeout(chatUpdate(), 1000);
}

var chatUpdate = function(){
	//console.log("D");
		var curr_id = window.location.href;
		curr_id = curr_id.split('/');
		$.get( "/chat_api/get?curr_id="+curr_id[4], function(msg_view){
			$('#chat_box').html( msg_view );
			
			chat_box = document.getElementById('chat_box');
			chat_box.scrollTop = chat_box.scrollHeight;

		} );
}