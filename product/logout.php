<?php

// Initialise the session.
session_start();

// Unset all of the session variables.
$_SESSION = array();

// also delete the session cookie.
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time() - 600, '/');
}

// Finally, destroy the session.
session_destroy();

// Redirect to member page
header("Location: login.php");
?>