<?php
require_once('models/NotesModel.php');

/**
 * Class BoardController
 * Provide API to work with board
 */
class BoardController extends Controller
{

    public function index($f = '')
    {
        //@todo error, because no function isn't chosen
    }

    /**
     * add note to the board with id
     * @param $chatId string identificator of the chat
     */
    public function addNote($chatId)
    {
        if (isset($_POST['text']) && $_POST['text'] != '') {
            $text = $_POST['text'];
            $notesModel = new NotesModel();
            $notesModel->addNote($chatId, $text);
        }


    }

    /**
     * edit note at the board with id and chatId
     * @param $chatId string identificator of the chat
     */
    public function editNote($chatId)
    {
        if (isset($_POST['text']) && $_POST['text'] != '') {
            $noteId = $_POST['id'];
            $text = $_POST['text'];
            $notesModel = new NotesModel();
            $notesModel->editNote($chatId, $noteId, $text);
        }


    }

    /**
     * revoves note from the board with id and chatId
     * @param $chatId string identificator of the chat
     */
    public function delNote($chatId)
    {

        $noteId = $_POST['id'];
        $notesModel = new NotesModel();
        $notesModel->delNote($chatId, $noteId);

    }

    /**
     * Gets all notes from chat with chatId
     * @param $chatId string identificator of the chat
     */
    public function getNotes($chatId)
    {
        $notesModel = new NotesModel();
        $notes = $notesModel->getAllNotes($chatId);
        $this->vars['notes'] = $notes;
        $this->showView('boardViews/notes', $this->vars);
    }
}

