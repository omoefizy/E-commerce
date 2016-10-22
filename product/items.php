<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>OSI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bootstrap"/> 
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="./assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
</head>
<body>
<!-- header -->
	<div class="header_top">
		<div class="container">
			<div class="clearfix"> </div>
		</div>
	</div>
		<div class="container">
			<div class="logo">
				<h1><a href="index.php"><img src="../assets/images/logo1.png" alt=" " class="img-responsive" /></a></h1>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="stroke">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="product.php" class="hvr-bounce-to-bottom">Products</a></li>
							<li><a href="About.php" class="hvr-bounce-to-bottom">About US</a></li>
							<li><a href="contact.php" class="hvr-bounce-to-bottom">Contact Us</a></li>
						</ul>
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
					<!-- search-scripts -->
					<script src="./assets/js/classie.js"></script>
					<script src="./assets/js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="container"> 
			<div class="banner-info">
				<h2>2016</h2>
				<h3> Object Oriented Testing<span>DjEasy</span></h3>
				<p>Make Life easy for every one.</p>
			</div>
		</div>
	</div>
<!-- //banner -->
	<?php include "OOTest.php"; ?>

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-contact">
				<form>
					<input type="text" placeholder="Enter your email to update" required=" ">
					<input type="submit" value="Subscribe">
				</form>
			</div>
			
			<div class="footer-copy">
				<p>© 2016 Omobo Software Interface. All rights reserved | Design by <a href="http://omobosoftwareinterface.com">OSI</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="./assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>