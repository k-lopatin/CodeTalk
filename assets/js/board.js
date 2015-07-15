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
    updateBoardInterval = setInterval(function () {
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

    /*---------- EDITING NOTE ---------------*/
    /**
     * Shows textarea fir editing
     */
    $('body').on('dblclick', '.simple_note', function () {
        var curText = $(this).html();
        var editHtml = '<textarea class="edit_note">' + curText + '</textarea>';
        editHtml += '<a class="note_save_btn">Сохранить</a>'
        $(this).html(editHtml);
        clearInterval(updateBoardInterval);
    });
    /**
     * Save edited note
     */
    $('body').on('click', '.note_save_btn', function () {

        var curNoteDiv = $(this).parent('.simple_note');
        var curNoteTextarea = curNoteDiv.children('textarea');
        var newNoteText = curNoteTextarea.val();
        var noteId = curNoteDiv.attr('rel');

        if (newNoteText != '') {
            $.post("/board_api/edit_note/" + curr_id[4],
                {
                    id: noteId,
                    text: newNoteText
                }).done(function (data) {
                    updateBoard();
                });
        }
    });


});




