<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'ebiomo7_aida';
	$DB_PASS = 'LOVEebi@1';
	$DB_NAME = 'ebiomo7_aida';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}