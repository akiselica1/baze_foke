<?php
	require_once('../WebApp/brains/konekcija.php');
	if($_POST){
		switch($_POST['action']){
			case 'promijeni-status-nv':
				
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

			case 'promijeni-status-nv':
				$zavrsni_radovi = "a";
				$zavrsni_radovi_tmp = file_get_contents('php://input');
				//echo "TIP: ".gettype($zavrsni_radovi_tmp)."<br>";
				echo $zavrsni_radovi_tmp;
				$k = json_encode($zavrsni_radovi_tmp);
				echo json_decode($k);
				//PARSIRANJE ... 

			break;
		}

	}
	
?>