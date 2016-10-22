<?php 
require_once('Users.php'); 

  //Instantiatefirst product - oass name to constructor 

  $user = new Users(); 
  $user->setUserID("Djeasy"); 
  $user->setUserName("Djeasy");
  $user->setEmail("omoefizy@gmail.com");
  $user->setPassword("omoefizy@$111");
  $user->setIsAdmin("Y");
  $user->setTokenCode("Which club are you supporting?");
  
	print "Users Created <br/><br/>";

  print "User ID = ".$user->getUserID();
  print "<br/>User Name = ".$user->getUserName();
  print "<br/>Email ".$user->getEmail();
  print "<br/>Password = ".$user->getPassword();
  print "<br/>IsAdmin = ".$user->getIsAdmin();
  print "<br/>TokenCode = ".$user->getTokenCode();


//Exiting will invoke the destructors 

  $user->__destruct(); 
?>