<?php
require_once('models/NewsModel.php');
require_once('Controller.php');

class NewsController extends Controller {
	function index($f = ''){
		$newsModel = new NewsModel;

		$this->vars['news'] = $newsModel->getAllNews();
		$this->showView('main', $this->vars);
	} 
}


