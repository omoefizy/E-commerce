<?php
session_start();
require_once '../login/class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<title>OSI</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Boostrap" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/main.css" rel="stylesheet" type="text/css" media="all" />

<!-- js -->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->

</head>
	
<body>
<!-- header -->
	<div class="header_top">
		<div class="container">
<script>
  (function() {
    var cx = '012853907945757623902:v3tvfrilla0';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
			</div>
			                    <ul class="nav pull-right">
                                                 <li class="dropdown">
                                                  <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
						   <a href="../login/member.php"> <?php echo $row['userName']; ?></a> <i class="caret"></i>
                                                  </a>
                                                   <ul class="dropdown-menu">
                                                <li>
                                                  <a tabindex="-1" href="../login/logout.php">Logout</a>
                                                </li>
                                               </ul>
                                             </li>
                                           </ul>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="logo_social_icons">
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
							<li><a href="./index.php">Home</a></li>
							<li class="active"><a href="product.php" class="hvr-bounce-to-bottom">Products</a></li>
							<li><a href="./About.php" class="hvr-bounce-to-bottom">About US</a></li>
							<li><a href="../contact/contact.php" class="hvr-bounce-to-bottom">Contact Us</a></li>
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
					<script src="../asset/js/classie.js"></script>
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
				<h2>Buy All Kinds Of Cars <span> Easy Shop</span></h2>
			</div>
		</div>
	</div>
<!-- //banner -->
				<?php 
   include ($_SERVER['DOCUMENT_ROOT'].'/product/Products.php'); 
    $product = new Products();
    $query="SELECT * FROM products";

    $result = $product->getProductList($query);

                          //echo $query;
                                                               
                          while ($row = mysqli_fetch_assoc($result)) {
                                
 echo' <div class="span2">';
    echo'<a href="../assets/images/001.jpg">';
      echo'<div class="reveal">';
        echo'<img src="../assets/images/' .$row['imageName']. '"/>';
        echo'<img class="hidden" src="../assets/images/car1.jpg" />';
      echo'</div>';
   echo' </a>';
    echo '<p>'. $row['name'] . '</p>';
  echo'<div class="span2">';
    echo'<a href="">';
     echo' <div class="reveal">';
       echo'<img src="../assets/images/' .$row['imageName']. '"/>';
              echo' <div class="hidden">';
           echo' <div class="caption">';
                echo'<div class="centered">';
                     echo '<p>'. $row['name'] . '</p>';
                     echo'<p>-</p>';
                     echo '<span class="actual">$' . $row['price'] . '</span>';
                echo'</div>';
           echo' </div>';
        echo'</div>';
     echo' </div>';
    echo'</a>';
     echo '<p>'. $row['name'] . '</p>';
    echo '<a class="button" href="./cart.php?add=' . $row['productID'] . '">Buy</a>';
  echo'</div>';
  echo'<div class="span2">';
    echo'<a href="">';
      echo'<div class="reveal">';
        echo'<img src="../assets/images/' .$row['imageName']. '"/>';
        echo'<div class="hidden">';
          echo'<img src="..assets/images/car2.jpg" />';
          echo'<div class="caption">';
            echo'<div class="centered">   ';       
                echo '<p>'. $row['name'] . '</p>';
                     echo'<p>-</p>';
                     echo '<span class="actual">$' . $row['price'] . '</span>';
            echo'</div>';
         echo' </div>';
        echo'</div>';
      echo'</div>';
    echo'</a>';
 echo '<p>'. $row['name'] . '</p>';
     echo '<a class="button" href="./cart.php?add=' . $row['productID'] . '">Buy</a>';
  echo'</div>';
echo'</div>';
                          }
                          
   
?>                 
                  /**
                  <?php
                  include '../fpdf181/pdfdown.php';
                  ?>  
                  */     
	<div class="services-list">
		<div class="container">
			<h1>Object Testing</h1>
			<div class="sevrices-list-grids">
				<div class="col-md-4 sevrices-list-grid">
					<ul>
						<li><a href="ootest.php">OOTest</a></li>
						<li><a href="item.php">Object Collection</a></li>
						<li><a href="ooUserTest.php">User Test</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //services -->

<!-- footer -->
	<div class="footer footer1">
		<div class="container">
			<div class="footer-contact">
				<form>
					<input type="text" placeholder="Enter your email to update" required=" ">
					<input type="submit" value="Subscribe">
				</form>
			</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="footer-copy">
				<p>© 2016 Omobo Software Interface. All rights reserved | Design by <a href="http://omobosoftwareinterface.com">OSI</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="../assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>