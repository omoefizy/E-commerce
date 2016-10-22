<?php
include 'Users.php';

$user = new Users();
$user->setUserID($_POST["userID"]);
$user->setUserName($_POST["userName"]);
$user->setEmail($_POST["email"]);
$user->setPassword($_POST["password"]);
$user->setIsAdmin('N');
$user->setTokenCode("I am a good boy");

$result = $user->addNewUser();

if($result == "success") {
	header("Location: {$_SERVER['HTTP_REFERER']}");
}
else{
	echo $result;
}
?>