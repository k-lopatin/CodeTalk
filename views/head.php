<!DOCTYPE HTML>
<html>
	<head>
		<title>Чат</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/chat.js"></script>
		<script src="/assets/js/board.js"></script>

		<link rel="stylesheet" href="/assets/css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="/assets/css/style1.css">
		<link rel="stylesheet" href="/assets/css/camera.css">
		<link rel="stylesheet" href="/assets/css/form.css">
		<script src="/assets/js/jquery.js"></script>
		<script src="/assets/js/jquery-migrate-1.1.1.js"></script>
		<script src="/assets/js/superfish.js"></script>
		<script src="/assets/js/forms.js"></script>
		<script src="/assets/js/jquery.ui.totop.js"></script>
		<script src="/assets/js/jquery.equalheights.js"></script>
		<script src="/assets/js/jquery.easing.1.3.js"></script>
		<script src="/assets/js/jquery.ui.totop.js"></script>
		<script src="/assets/js/tms-0.4.1.js"></script>
		<script>
			$(document).ready(function(){
				$('.slider_wrapper')._TMS({
					show:0,
					pauseOnHover:false,
					prevBu:'.prev',
					nextBu:'.next',
					playBu:false,
					duration:800,
					preset:'fade',
					pagination:true,//'.pagination',true,'<ul></ul>'
					pagNums:false,
					slideshow:8000,
					numStatus:false,
					banners: 'fade',
					waitBannerAnimation:false,
					progressBar:false
				});
			});
			$(document).ready(function(){
				!function(){
			var map=[]
			 ,names=[]
			 ,win=$(window)
			 ,header=$('header')
			 ,currClass
			$('.content').each(function(n){
			 map[n]=this.offsetTop
			 names[n]=$(this).attr('id')
			})
			win
			 .on('scroll',function(){
				var i=0
				while(map[i++]<=win.scrollTop());
				if(currClass!==names[i-2])
				currClass=names[i-2]
				header.removeAttr("class").addClass(names[i-2])
			 })
			}(); });
					function goToByScroll(id){
				$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
				}
				$(document).ready(function(){
					$().UItoTop({ easingType: 'easeOutQuart' });
				});
		</script>
	</head>