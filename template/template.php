<!DOCTYPE HTML>
<html>
	<head>
		<title>Water Blog</title>
		<link rel="shortcut icon" href="images/logo2.png" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	
	<body class="index">
		<div id="page-wrapper">	
			<!-- Header -->
			<header id="header" class="alt">
				<a href="index.php" style="color:#fff; margin-left:60px;"><img src="images/logo2.png" class="logo1"></img>  Water Blog</a>

					<nav id="nav">

						<ul>
							<?php
								if (!empty($_SESSION['login_user'])) {
									echo '<li class="current"><a href="index.php?c=User&p=logout">LOGOUT</a></li>';
								} else {
									echo '<li class="current"><a href="index.php?c=User&p=login">LOGIN</a></li>';
								}
							?>
							<li class="current"><a href="index.php?c=User&p=cadastrar">cadastre-se</a></li>
							<li class="current"><a style="margin-right:80px;" href="index.php">HOME</a></li>
						</ul>

					</nav>
			</header>
				<div id="banner">
				</div>
				<article id="main">
					<?php
						include $view;
					?>
				</article>
			<!-- Footer -->
				<footer id="footer">
				<!-- links -->
					<script>
						function link_github() {
    						window.open('https://github.com/eduardofidera', '_blank');
					}
						function link_google(){
							window.open('https://www.google.com', '_blank');
						}
					</script>

					<ul class="icons">
						<li><a newtab="yes" href="javascript:link_github()" class="icon circle fa-github"><span class="label">Github</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy;Images by <a href="javascript:link_google()">Google</a></li>
					</ul>

				</footer>


		</div>

		<!-- Scripts -->
		    <script src="assets/js/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			
	</body>
</html>