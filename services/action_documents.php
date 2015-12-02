<?php
	require_once('../WebApp/brains/konekcija.php');
	if($_POST){
		switch($_POST['action']){
			case 'pokupi-dokumente':
				
			break;
			
		}
	}
	else {
		switch($_GET['action']){
			case 'pokupi-dokumente':
				$values = array();
				$kveri = $db->query("SELECT * FROM dokument");
				foreach($kveri as $dokument){
					$values[] = array("id" 		=> $dokument['id'],
									  "naslov" 	=> $dokument['Naslov'],
									  "tekst"   => $dokument['Tekst'],
									  "datum"   => $dokument['Datum kreiranja']);
				}
				//$osobe = array("osobe" => $values);
				//echo json_encode($osobe);
				echo json_encode($values);
			break;

			
		}
	}
	
?>