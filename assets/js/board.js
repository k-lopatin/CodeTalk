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

        //Check if note is already editing
        var isEdited = $(this).attr('data-edited');
        if (isEdited == 1) return;

        $(this).attr('data-edited', 1);
        var curText = $(this).html();
        var editHtml = '<textarea class="edit_note">' + curText + '</textarea>';
        editHtml += '<a class="note_save_btn">Сохранить</a>';
        editHtml += '<a class="note_del_btn">Удалить</a>';
        editHtml += '<input type="text" class="note_reminder_input" id="datetimepicker"/>';
        editHtml += '<a class="note_set_reminder">Напомнить</a>';


        $(this).html(editHtml);

        $('#datetimepicker').datetimepicker({
            format: 'd.m.Y H:i'
        });
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

    /**
     * Remove edited note
     */
    $('body').on('click', '.note_del_btn', function () {

        var curNoteDiv = $(this).parent('.simple_note');
        var noteId = curNoteDiv.attr('rel');

        $.post("/board_api/del_note/" + curr_id[4],
            {
                id: noteId
            }).done(function (data) {
                curNoteDiv.fadeOut(400, function () {
                    updateBoard();
                });
            });

    });

    /**
     * Set reminder for edited note
     */
    $('body').on('click', '.note_set_reminder', function () {

        var curDateInput = $(this).siblings('.note_reminder_input');
        alert(curDateInput.val());

    });



});




