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
			case 'pokupi-zavrsne':
				$values = array();
				$kveri = $db->query("SELECT * FROM zavrsni_radovi");
				foreach($kveri as $zavrsni){
					$values[] = array("id" 		 => $zavrsni['id'],
									  "kandidat" => $zavrsni['kandidat'],
									  "tema"     => $zavrsni['tema'],
									  "mentor"   => $zavrsni['mentor']);
				}
				//$osobe = array("osobe" => $values);
				//echo json_encode($osobe);
				echo json_encode($values);
			break;
		}
	}
	
?>