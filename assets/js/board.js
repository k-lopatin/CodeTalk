$(document).ready(function() {


	$('#note_text').bind("enterKey", function (e) {
		msg = $('#new_msg').val();
		$('#new_msg').val('');

		name = $('#username').val();

		var curr_id = window.location.href;
		curr_id = curr_id.split('/');

		if (msg != '') {
			$.post("/board_api/add/" + curr_id[4],
				{
					username: name,
					message: msg
				});
		}

	});


	$('#note_text').keyup(function (e) {
		if (e.keyCode == 13) {
			$(this).trigger("enterKey");
		}
	});

}