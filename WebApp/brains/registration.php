<?php
	require("konekcija.php")
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$db->query("INSERT INTO users(username , password) VALUES {$username}, {$passowrd} ");
	}
?>