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

				$kveri = $db->query("SELECT zavrsni_rad.id as id, 
											zavrsni_rad.tema as tema, 
											zavrsni_rad.abstract as abstract, 
											zavrsni_rad.kandidat as kandidat, 
											osoba.ime as ime,	 
											osoba.prezime as prezime,
											osoba.id as mentor_id 
									 FROM zavrsni_rad, osoba 
									 WHERE osoba.id=zavrsni_rad.mentor_id");

				foreach($kveri as $zavrsni){
					$ime = $zavrsni['ime']." ".$zavrsni['prezime'];
					$values[] = array("id" 		  => $zavrsni['id'],
									  "kandidat"  => $zavrsni['kandidat'],
									  "abstract"  => $zavrsni['abstract'],
									  "tema"      => $zavrsni['tema'],
									  "mentor"    => $ime,
									  "mentor_id" => $zavrsni['mentor_id'],
									  "potvrda"   => "Odbij");
				}

				echo json_encode($values);

			break;

			case 'promijeni-status-nv':

				$zr_db = file_get_contents('php://input');
				$zavrsni_radovi = json_decode($zr_db, true);

				for($i=0; $i<count($zavrsni_radovi); $i++){					

					if(isset($_SESSION['username'])){
						if($_SESSION['titula']=='kadrovska'){
							$insert_poveznu = $db->query("INSERT INTO status_odobren (vrijednost, 
																					  osoba_id, 
																			  		  zavrsni_rad_id, 
																			  		  zavrsni_rad_mentor_id)
														  VALUES(0, 
														  		 ".$zavrsni_radovi[$i]['mentor_id'].", 
														  		 ".$zavrsni_radovi[$i]['id'].",
														  		 ".$zavrsni_radovi[$i]['mentor_id'].")");

							$update_status_zavrsnog = $db->query("UPDATE zavrsni_rad 
																  SET status_nivoa=1");
						}
						else if($_SESSION['titula']=='Docent' || $_SESSION['titula']=='Dekan'){

							$mentor_id = $zavrsni_radovi[$i]['mentor_id'];
							$zavrsni_rad_id = $zavrsni_radovi[$i]['id'];
					
							if($zavrsni_radovi[$i]['potvrda']=='Odobri'){
								$vrijednost_kveri = $db->query("SELECT vrijednost as vrijednost
																FROM   status_odobren
																WHERE  zavrsni_rad_id=".$zavrsni_rad_id."
															    AND    osoba_id=".$mentor_id."");
								$vrijednost="";
								foreach ($vrijednost_kveri as $data) $vrijednost = $data['vrijednost'];
								if($vrijednost!=1){
									$update_poveznu = $db->query("UPDATE status_odobren
																  SET    vrijednost=1
																  WHERE  zavrsni_rad_id=".$zavrsni_rad_id."
																  AND    osoba_id=".$mentor_id."");
								}
							}
						}
					}
					
					/*if ($insert_poveznu){
						echo "uspjelo";

					}
					else {
						echo "neuspjelo\r\n";
						echo mysqli_error($db);
					}*/
					
						
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