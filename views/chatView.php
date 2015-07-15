<?php 
	if(!isset($_SESSION)){
   		session_start();
	}
	if(!isset($_SESSION['curr_login'])){
		$_SESSION['curr_login'] = 'guest';
	}
?>
<?php require_once('head.php');?>
	<body id="chat_view">

		<div id="top_panel">
			<ul>
				<li>Проект: <?php echo $v['project_id']; ?></li>
				<li><a href="/">Другие проекты</a></li>
				<li><a href="/">Пригласить человека</a></li>
			</ul>			
		</div>

		<div id="container">

			<div id="board">
				<?php $this->showView('boardViews/board', $this->vars); ?>			
			</div>
			<div id="chat">
				<div id="chat_box">
				
				</div>
				<div class="is_write">
					<img src="/assets/images/pencil.png" .>
				</div>
				<div id="add_msg">
					<textarea id="new_msg"></textarea>
					<input type="text" id="username" value="<?= $_SESSION['curr_login']?>" />
				</div>
			</div>

		

	</body>
</html>