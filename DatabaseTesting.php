<?php 
include "../../config/config.php";

  /*** create a new mysqli connection object ***/

  $connection = new mysqli($db["hostname"],$db["username"],$db["password"],$db["database"]);


/* check connection */ 

  if(mysqli_connect_errno()){

  die('Connect Error (' . mysqli_connect_errno() . ') '

  . mysqli_connect_error());

  }

  $sql = "SELECT * FROM products";

  /*** prepare statement ***/

  $stmt = $connection->prepare($sql);

  /*** execute our SQL query ***/

  $stmt->execute();

  /*** bind the results ***/

  $stmt->bind_result($productID, $name, $price, $imageName, $quantity);

  /*** loop over the result set ***/

  print "<table border = 1 >"; 

  while ($stmt->fetch()){ 

  print "  <tr>"; 

  print "    <td>" . $productID . "</td>"; 

  print "    <td>" . $name . "</td>"; 

  print "    <td>" . $price . "</td>"; 

  print "    <td>" . $imageName . "</td>"; 

  print "    <td>" . $quantity  . "</td>"; 


  print "  </tr>"; 

  } 

  print "</table>"; 

  /*** close connection ***/

  $connection->close();


?>