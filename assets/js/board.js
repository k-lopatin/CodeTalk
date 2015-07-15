$(document).ready(function () {

    //getting id of the current chat
    var curr_id = window.location.href;
    curr_id = curr_id.split('/');


    /**
     * updates all board
     */
    function updateBoard() {

        /**
         * Getting notes to the board
         */
        $.post("/board_api/get_notes/" + curr_id[4],
            {}).done(function (data) {
                $('#notes_block').html(data);
            });
    }

    updateBoard();
    updateBoardInterval = setInterval(function(){
        updateBoard();
    }, 5000);




    /**
     * Adds new note to the board
     */
    $('#add_note_link').click(function (e) {

        text = $('#note_text').val();
        $('#note_text').val('');

        name = $('#username').val();


        if (text != '') {
            $.post("/board_api/add_note/" + curr_id[4],
                {
                    username: name,
                    text: text
                }).done(function (data) {
                    updateBoard();
                });
        }

    });


});