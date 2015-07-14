<?php
require_once('Model.php');
class NoteModel extends Model {

	function getAllNotes(){
		$notes = array();

		$result = $this->mysqli->query(
				'SELECT guest_book.id, guest_book.body, guest_book.created_at, users.login 
					FROM guest_book, users 
					WHERE guest_book.user_id = users.id
					ORDER BY guest_book.created_at DESC');

		if ($result) { 
			$i = 0;
		    while ($row = $result->fetch_assoc()) {
		    	$notes[$i]['id'] = $row['id'];
		    	$notes[$i]['text'] = $row['body'];
		    	$notes[$i]['created_at'] = $row['created_at'];
		    	$notes[$i]['username'] = $row['login'];
		    	$i++;
			}
		} 
		return $notes;
	}

	function addNote($text){
		$text = mysqli_real_escape_string( $this->mysqli, strip_tags( $text ) );
		$user_id = $_SESSION['user_id'];
		$this->mysqli->query('INSERT INTO guest_book (user_id, body, created_at) VALUES ("'.$user_id.'", "'.$text.'", '.time().')');
		echo mysqli_error($this->mysqli);
	}
	function editNote($id, $text){
		$text = trim( mysqli_real_escape_string($this->mysqli, $text) );
		$this->mysqli->query('UPDATE guest_book SET body = "'.$text.'" WHERE id='.$id);
		echo mysqli_error($this->mysqli);
	}

	function delNoteById($id){
		$this->mysqli->query( 'DELETE FROM guest_book WHERE id = '.$id );
		echo mysqli_error($this->mysqli);
	}

	/*function getNewsById($id){
		$news = array();

		if ($result = $this->mysqli->query('SELECT id, title, body, created_at FROM news WHERE id = '.$id) ) { 
			$i = 0;
		    while ($row = $result->fetch_assoc()) {
		    	$news[$i]['id'] = $row['id'];
		    	$news[$i]['title'] = $row['title'];
		    	$news[$i]['body'] = $row['body'];
		    	$news[$i]['created_at'] = $row['created_at'];
		    	$i++;
			}
		} 

		return $news;
	}*/

}