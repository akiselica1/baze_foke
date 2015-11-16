<?php 
	session_start();
	date_default_timezone_set("Europe/Sarajevo");
	$debug = false;

	if($debug) {
		error_reporting(E_ALL);
 		ini_set('display_errors',1);
		ini_set('display_startup_errors',1);
 		error_reporting(-1);
	}

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "kadrovska";

	$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
	$db->set_charset("utf8");
?>