<?php 
require_once('Products.php'); 

  //Instantiatefirst product - oass name to constructor 

  $product = new Products(); 
  $product->setProductID(2); 
  $product->setName("Mercedes Benz");
  $product->setPrice(1000.00);
  $product->setImageName("Benz.jpg");
  $product->setQuantity(10);
  
	print "Products Created <br/><br/>";

  print "Product ID = ".$product->getProductID();
  print "<br/>Name = ".$product->getName();
  print "<br/>Price = RM ".$product->getPrice();
  print "<br/>Image Name = ".$product->getImageName();
  print "<br/>Quantity = ".$product->getQuantity();


//Exiting will invoke the destructors 
  $product->__destruct(); 
?>