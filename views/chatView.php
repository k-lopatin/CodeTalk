<?php require_once('head.php');?>

	<body id="chat_view">
			<header class="page1">
			<div class="container_12">
				<div class="grid_12">
					<h1><a href="#" onClick="goToByScroll('page1'); return false;"><img src="/assets/images/logo.png"></a></h1>
					<div class="menu_block">
						<nav class="">
							<ul class="sf-menu">
								<li class="current men"><a href="#">Проект: <?php echo $v['project_id']; ?> </a> <strong class="hover"></strong></li>
								<li class=" men2"><a onClick="goToByScroll('page3'); return false;" href="#">Другие проекты</a> <strong class="hover"></strong></li>
								<li class=" men1"><a onClick="goToByScroll('page2'); return false;" href="#">Пригласить человека</a> <strong class="hover"></strong></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</header>
		<!--<div id="top_panel">
			<ul>
				<li>Проект: <?php echo $v['project_id']; ?></li>
				<li><a href="/">Другие проекты</a></li>
				<li><a href="/">Пригласить человека</a></li>
			</ul>			
		</div>-->

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
		</div>
		<div class = "chat_footer">
			<?php require_once('footer.php');?>
		</div>
	</body>
</html>