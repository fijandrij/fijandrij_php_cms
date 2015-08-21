<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$naslov = 'Filip Jandrijevic - prijava';
	$smarty = new Smarty;
	$smarty->assign("naslov", $naslov);
	//$smarty->assign("greska", $greska);
	
	$korisnik = $_SESSION['korisnik_ime'];
	
	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	if(!isset($korisnik)){

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		if(isset($_GET['greska']) && $_GET['greska'] == 1){
			$greska['neprijavljen'] = 'Niste prijavljeni u sustav';
			$smarty->assign("greska", $greska);
		}

		if(!empty($username) && !empty($password)){
			
			$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$username}' AND lozinka = '{$password}' LIMIT 1";
			$result = mysql_query($query);
			if(mysql_num_rows($result) == 1){
				$korisnik_pronaden = mysql_fetch_array($result);
				if($korisnik_pronaden['status_korisnika_id_status'] == 1){
					$user_id = $korisnik_pronaden['user_id'];
					if($korisnik_pronaden['neuspjesne_prijave'] >= 3){
						header('Location: fijandrij_prijava.php?blokiran=1');
						exit;
					}
					mysql_query("UPDATE korisnik SET neuspjesne_prijave = 0 WHERE user_id = '$user_id'");

					$_SESSION['korisnik_id'] = $korisnik_pronaden['user_id'];
					$_SESSION['korisnik_ime'] = $korisnik_pronaden['korisnicko_ime'];
					$_SESSION['korisnik_tip'] = $korisnik_pronaden['tip_korisnika_id'];
					$_SESSION['korisnik_slika'] = $korisnik_pronaden['slika'];

					if(isset($_POST['checkbox'])){
						setcookie('korisnik', $korisnik_pronaden['korisnicko_ime'], time() + 3600);
					}else if(isset($_COOKIE['korisnik'])){
						setcookie('korisnik', $korisnik_pronaden['korisnicko_ime'], time() - 42000);
					}	
					header('Location: fijandrij_ispis.php');
					exit;
				}else{
					$greska['status_pogresan'] = 'Vas racun jos nije aktiviran';
					$smarty->assign("greska", $greska);
				}
			}else{
				$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$username}' LIMIT 1";
				$result = mysql_query($query);
				if(mysql_num_rows($result) == 1){
					$korisnik_pronaden = mysql_fetch_array($result);
					//
					if($korisnik_pronaden['tip_korisnika_id'] != 3){
						$odbijen = $korisnik_pronaden['neuspjesne_prijave'];
						$odbijen++;
						$user_id = $korisnik_pronaden['user_id'];
						mysql_query("UPDATE korisnik SET neuspjesne_prijave = '$odbijen' WHERE user_id = '$user_id'");
						if($odbijen >= 3){
							header('Location: fijandrij_prijava.php?blokiran=1');
							exit;
						}
						$greska['blokada'] = 'Lozinka nije valjana ('. $odbijen . '/3)';
						$smarty->assign("greska", $greska);
					}else{
						$greska['prijava_pogresna'] = 'Pogrešna lozinka';
						$smarty->assign("greska", $greska);
					}
				}else{

					$greska['prijava_pogresna'] = 'Korisnik ne postoji';
					$smarty->assign("greska", $greska);
				}
				

			}
		}else{
			if(isset($_GET['logout']) && $_GET['logout'] == 1){
				$poruka = 'Sada ste odjavljeni iz sustava';
				$smarty->assign("poruka", $poruka);
			}

			if(isset($_GET['blokiran']) && $_GET['blokiran'] == 1){
				$blokiran = 'Vaš račun je zaključan';
				$smarty->assign("blokiran", $blokiran);
			}

			if(isset($_COOKIE['korisnik'])){
				$smarty->assign("ime_korisnika", $_COOKIE['korisnik']);		
			}
			
		}
	}else{
		header('Location: fijandrij_ispis.php');
		exit;
	}
	$smarty->display("fijandrij_prijava.tpl");
	mysql_close();
?>