<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/AssCheckP1/cart.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../assets/css/main.css"/>
<title>Check Out</title>
</head>

<body>

<div class="container">
  <div id="apDiv1"><img src="../assets/images/super-eagles.png" width="170" height="150" alt=" Logo" /></div>
  <div class="header"></div>
  <div id="h-navbar"><?php include ($_SERVER['DOCUMENT_ROOT']. "/AssCheckP1/header2.php"); ?></div>
  <div class="sidebar1">
		<?php include ($_SERVER['DOCUMENT_ROOT']. "/AssCheckP1/leftnav2.php"); ?>
	</div>
  <div class="content">
    <h1>Check Out</h1>
	   <?php
          cart();
      ?>
    </div>
  <div class="footer">
		<?php include ($_SERVER['DOCUMENT_ROOT']. "/AssCheckP1/footer.php"); ?>
  </div>
<!-- end .container --></div>
</body>
</html>