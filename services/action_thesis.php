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

			case 'promijeni-status-nv':
				$zr_db = file_get_contents('php://input');
				
				$zavrsni_radovi = json_decode($zr_db, true);
				

				for($i=0; $i<count($zavrsni_radovi); $i++){
					echo "ID: ".$zavrsni_radovi[$i]['id']."<br>";
					echo "Kandidat: ".$zavrsni_radovi[$i]['kandidat']."<br>";
					echo "Mentor: ".$zavrsni_radovi[$i]['mentor']."<br>";
					echo "Tema: ".$zavrsni_radovi[$i]['tema']."<br>";
					//UPDATE STATUSA_NIVOA IZ TABELE ZAVRSNI RAD
					//POPUNITI VELIKU POVEZNU TABELU
					//OSOBA, ZA TAJ ZAVRSNI U TOM STATUS_NIVOU IMA TE PRIVILEGIJE
					//SELECT ZAVRSNI_RADOVI.STATUS FROM ZAVRSNI_RADOVI zr, POVEZNA TABELA pt, OSOBA o WHERE
					//zavrsni_radovi.id=pt.zavrsni_radovi.id and pt.osoba_idd = $_SESSION['id']
					//AND o.id=pt.osoba_id;
					//if kveri->result()==1, pokazi checkboxe... inicijalno su oba necheckirana, 
					//i onda chekiraj jedan od njih.
				}			
			break;
		}
	}
?>