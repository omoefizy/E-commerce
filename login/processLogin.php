<?php
include 'Users.php';

$user = new Users();
$user->setUserID($_POST["username"]);
$user->setPassword($_POST["password"]);

$redirectPage = $user->validateLogin();

header($redirectPage);
?>