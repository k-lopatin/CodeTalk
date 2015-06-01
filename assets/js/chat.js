$(document).ready(function(){

	//update chat
	chatUpdateInt = setInterval( function(){
		var curr_id = window.location.href;
		curr_id = curr_id.split('/');
		$.get( "/chat_api/get?curr_id="+curr_id[4], function(msg_view){
			$('#chat_box').html( msg_view );
		} )
	}, 300 );



	$('#new_msg').bind("enterKey", function(e){
		msg = $('#new_msg').val();
		$('#new_msg').val('');
		var curr_id = window.location.href;
		curr_id = curr_id.split('/');
   		if( msg != '' ){
   			$.post("/chat_api/add/"+curr_id[4], 
   				{message: msg } );
   		}
	});


	$('#new_msg').keyup(function(e){
	    if(e.keyCode == 13)
	    {
	        $(this).trigger("enterKey");
	    }
	});
})