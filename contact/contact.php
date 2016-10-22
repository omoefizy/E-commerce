<!DOCTYPE html>
<html>
<head>
<title>OSI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="bootsrap" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->

</script>
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
				<h1><a href="index.html"><img src="../assets/images/logo1.png" alt=" " class="img-responsive" /></a></h1>
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
							<li><a href="../index.php" class="hvr-bounce-to-bottom">Home</a></li>
							<li><a href="../product.php" class="hvr-bounce-to-bottom">Products</a></li>
							<li><a href="../about.php" class="hvr-bounce-to-bottom">About US</a></li>
							<li class="active"><a href="contact.php" class="hvr-bounce-to-bottom">Contact Us</a></li>
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
					<script src="../assets/js/classie.js"></script>
					<script src="../assets/js/uisearch.js"></script>
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
	<div class="banner1">
		<div class="container"> 
			<div class="banner-info1">
				<h2>We are here to serve you better<span> Easy Store</span></h2>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="map">
				<h3>View on map</h3>
				
				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:366px;width:800px;'><div id='gmap_canvas' style='height:366px;width:731px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://add-map.org/'>Add-Map.org</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=2873e0be9a68fba7c32daa620ca8bddad9bedfa0'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(2.7813147,101.91702889999999),mapTypeId: google.maps.MapTypeId.HYBRID};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(2.7813147,101.91702889999999)});infowindow = new google.maps.InfoWindow({content:'<strong>KTG Education Group</strong><br>Mantin Negeri Sembilan<br>71700 Mantin<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
			<div class="contact-grids">
				<div class="col-md-3 contact-grid">
					<div class="call">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li>+601139002765</li>
								
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li>Ktg Education Group,</li>
								<li>Mantin, Malaysia.</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="mail">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li><a href="#">omoefizy@gmail.com</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-5 contact-grid">
<?php
include 'index.php';
?>
				</div>
				<div class="col-md-4 contact-grid">
					<div class="newsletter1">
						<h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Newsletter</h3>
					</div>
					<form>
						<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="submit" value="Subscribe" >
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //contact -->
<!-- footer -->
	<div class="footer footer1">
		<div class="container">
			<h3>Sign up for our newsletter</h3>
			<?php
			include '../includes/footer.php';
			?>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="../assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
}