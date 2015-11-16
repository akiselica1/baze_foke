<?php
	require_once('../WebApp/brains/konekcija.php');
	if($_POST){
		switch($_POST['action']){
			case 'pokupi-korisnike':
				
			break;
			
		}
	}
	else {
		switch($_GET['action']){
			case 'pokupi-korisnike':
				$values = array();
				$kveri = $db->query("SELECT * FROM osoba");
				foreach($kveri as $osoba){
					$values[] = array("id" 		=> $osoba['id'],
									  "ime" 	=> $osoba['ime'],
									  "prezime" => $osoba['prezime']);
				}
				//$osobe = array("osobe" => $values);
				//echo json_encode($osobe);
				echo json_encode($values);
			break;

			
		}
	}
	
?>