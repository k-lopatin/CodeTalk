<?php

class NotesModel extends Model
{

    function getAllNotes($chatId)
    {
        $notes = array();

        $result = $this->mysqli->query(
            'SELECT id, text, user_id, created_at, reminder
					FROM notes
					WHERE chat_id = "' . $chatId . '"
					ORDER BY created_at DESC');

        if ($result) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $notes[$i]['id'] = $row['id'];
                $notes[$i]['text'] = $row['text'];
                $notes[$i]['user_id'] = $row['user_id'];
                //$notes[$i]['username'] = $row['login'];
                $i++;
            }
        }
        return $notes;
    }

    function addNote($chatId, $text)
    {
        $text = mysqli_real_escape_string($this->mysqli, strip_tags($text));
        //$user_id = $_SESSION['user_id'];

        $this->mysqli->query('INSERT INTO notes (chat_id, text, created_at) VALUES ("' . $chatId . '", "' . $text . '", ' . time() . ')');
        echo mysqli_error($this->mysqli);
    }

    function editNote($chatId, $id, $text)
    {

        $text = trim(mysqli_real_escape_string($this->mysqli, $text));
        $this->mysqli->query('UPDATE notes
                              SET text = "' . $text . '"
                              WHERE chat_id = "' . $chatId . '" AND id=' . $id);
        echo mysqli_error($this->mysqli);
    }

    function delNote($chatId, $id){
        $this->mysqli->query( 'DELETE FROM notes
                              WHERE chat_id = "' . $chatId . '" AND id=' . $id );
        echo mysqli_error($this->mysqli);
    }
}