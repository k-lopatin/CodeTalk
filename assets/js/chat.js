var curr_time = 0;
var curr_search_val = "";
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


			if(data[0] > curr_time && $( "#search" ).val() == ""){
				chatUpdate();
				curr_time = data[0];
			}

		} );



		$.get( "/chat_api/check_write?curr_login="+$( "#username" ).val()+"&id="+curr_id[4], function(data){
			//$('.is_write').empty();
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

		var new_search_val = $( "#search" ).val();
		if(new_search_val == "" && curr_search_val != ""){
			chatUpdate();
		}
		if(new_search_val == ""){
			curr_search_val = new_search_val;			
		}
		if( new_search_val != curr_search_val && new_search_val != "") {
			curr_search_val = new_search_val;
			console.log(curr_search_val);
			$.get( "/chat_api/search?curr_id="+curr_id[4]+"&val="+curr_search_val, function(data){
				if(data == ""){
					$('#chat_box').html('<div id = "not_found">По вашему запросу ничего не найдено</div>');
				} else {
					$('#chat_box').html( data );
				
					chat_box = document.getElementById('chat_box');
					chat_box.scrollTop = chat_box.scrollHeight;
				}

			} );
		}

	}, 100 );

	$('#new_msg').bind("enterKey", function(e){
		msg = $('#new_msg').val();

		$('#new_msg').val('');

		name = $('#username').val();

		var curr_id = window.location.href;
		curr_id = curr_id.split('/');

   		if( msg != '\n' ){
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
	if( $( "#search" ).val() == "" ){
		chatUpdate();
	}
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

var main_submit_f = function(id){
	if(id == 'register'){
		var msg = $('#register').serialize();
		$.ajax({
	          type: 'POST',
	          url: 'registration',
	          data: msg,
	          success: function(data) {
	          	data = JSON.parse(data);
	          	$('.err_msg').empty();
	          	$('.err_msg.one').append( data['msg'] );
	          	if(data['is_reg'])
	          		$('#register')[0].reset();
	            console.log(data['is_reg']);
	          },
	          error:  function(xhr, str){
	                console.log('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });
	} else {
		var msg = $('#auth').serialize();
		$.ajax({
	          type: 'POST',
	          url: 'auth',
	          data: msg,
	          success: function(data) {
	          	data = JSON.parse(data);
	          	$('.err_msg').empty();
	          	$('.err_msg.two').append( data['msg'] );
	          	if(data['auth'])
	          		$('#auth')[0].reset();
	          	setTimeout(function() {
	          		if(data['auth'] == 1){
	          			window.location.href = '/project/'+data['chat_id'];	
				   		}	

	          		}, 1000);
	            console.log(data['chat_id']);
	          },
	          error:  function(xhr, str){
	                console.log('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });
	}
}