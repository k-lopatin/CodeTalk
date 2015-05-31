<!DOCTYPE HTML>
<html>
	<head>
		<title>JS</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/10.js"></script>
		<script src="/assets/js/fabric.min.js"></script>
		<script src="/assets/js/main.js"></script>

			<link rel="stylesheet" href="/assets/css/skel.css" />
			<link rel="stylesheet" href="/assets/css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<div id="wrapper">

			<!-- Header -->
				<?php include('blocks/mainSidebar.php'); ?>

			<!-- Main -->
				<div id="main">

					<!-- One -->
						<section id="one">
							<div class="container">
								<header class="major">
									<h2>Поиск корней уравнения методом Ньютона</h2>								
									<table width="100%">
									    <tr>
									        <td>
									            sin(x) - px^2 = 0 <br />
									            p: <input type="text" id="p" value="-3"  /><br />
									            <input type="button" onClick="draw1()" value="Нарисовать" /><br />
									        </td>
									        <td> 
									            <b>Метод Ньютона</b><br />
									            eps: <input type="text" id="epsN" value="0.0001"  /><br />
									            <input type="button" onClick="newton()" value="Найти корень" /><br />
									            <span id="answerN"></span>        
									        </td> 
									    </tr>   	

									 </table>
									 <div id="div_canvas"></div>
								</header>
							</div>
						</section>
					

				</div>			

		</div>
	</body>
</html>