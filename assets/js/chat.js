$(document).ready(function(){

	//update chat
	chatUpdateInt = setInterval( function(){
		$.get( "/chat_api/get", function(msg_view){
			$('#chat_box').html( msg_view );
		} )
	}, 300 );



	$('#new_msg').bind("enterKey", function(e){
		msg = $('#new_msg').val();
		$('#new_msg').val('');

   		if( msg != '' ){
   			$.post( "/chat_api/add", 
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