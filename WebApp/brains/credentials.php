<?php 
	require("konekcija.php");
	if(isset($_POST['login'])){
		$username = $db->escape_string($_POST['username']);
		$password = $db->escape_string($_POST['password']);

		$exists = $db->query("SELECT COUNT(id) as num FROM users WHERE username = '{$username}'")->fetch_assoc();
		if($exists['num']>0){
			$sifra = $db->query("SELECT * FROM users WHERE password = {$password}");
			if($sifra['password'] == $password){
				$SESSION['id'] = $sifra['id'];
			}
		}
	}
?>