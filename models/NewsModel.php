<?php
require_once('Model.php');
class NewsModel extends Model {

	function getAllNews(){
		$news = array();

		if ($result = $this->mysqli->query('SELECT id, title, body, created_at FROM news ORDER BY created_at DESC')) { 
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
	}

	function addNews($title, $body){
		$title = mysqli_real_escape_string($this->mysqli, $title);
		$body = mysqli_real_escape_string($this->mysqli, $body);
		$this->mysqli->query('INSERT INTO news (title, body, created_at) VALUES ("'.$title.'", "'.$body.'", '.time().')');
		echo mysqli_error($this->mysqli);
	}
	function editNews($id, $title, $body){
		$title = trim( mysqli_real_escape_string($this->mysqli, $title) );
		$body = trim( mysqli_real_escape_string($this->mysqli, $body) );
		$this->mysqli->query('UPDATE news SET title = "'.$title.'", body = "'.$body.'" WHERE id='.$id);
		echo mysqli_error($this->mysqli);
	}

	function delNewsById($id){
		$this->mysqli->query( 'DELETE FROM news WHERE id = '.$id );
		echo mysqli_error($this->mysqli);
	}

	function getNewsById($id){
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
	}

}