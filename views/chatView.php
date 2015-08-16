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
					<img src="/assets/images/pencil.png">
				</div>
				<div id="add_msg">
					<textarea id="new_msg"></textarea>
					<input type="text" id="username" class="base_input" value="<?= $v['curr_login'] ?>" />
					<input type="text" id="search" class="base_input" placeholder="Поиск сообщений" value="" />					
				</div>
			</div>

		

	</body>
</html>