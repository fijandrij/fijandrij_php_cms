<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	require_once("recaptchalib.php");

	$korisnik = $_SESSION['korisnik_ime'];
	$tip = $_SESSION['korisnik_tip'];
	$slika = $_SESSION['korisnik_slika'];

	$smarty = new Smarty;

	$smarty->assign("tip", $tip);
	

	$user = $_GET['user'];
	
	if(isset($korisnik) && $_SESSION['korisnik_tip'] == 3){

		$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$user'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	

		if(isset($_GET['err'])){
			$greska['iste_sifre'] = 'Lozinka i ponovljena lozinka nisu jednake';
		}else
			$greska['iste_sifre'] = '';
	
		$naslov = 'Filip Jandrijevic - uređivanje profila';


		$smarty->assign("user", $user);
		$smarty->assign("naslov", $naslov);
		$smarty->assign("ime", $row['ime']);
		$smarty->assign("prezime", $row['prezime']);
		$smarty->assign("email", $row['email']);
		$smarty->assign("username", $row['korisnicko_ime']);
		$smarty->assign("registracija", $registracija);
		$smarty->assign("greska", $greska);

		$smarty->assign("korisnik", $korisnik);
		$smarty->assign("tip", $tip);
		$smarty->assign("slika", $slika);

		//

		if($row['neuspjesne_prijave'] >= 3){
			$blokiran = true;
			$smarty->assign("blokiran", $blokiran);
		}


		$smarty->display("uredi_profil.tpl");

	}else if(isset($korisnik) && $korisnik == $user){


		$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnik'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	

		if(isset($_GET['err'])){
			$greska['iste_sifre'] = 'Lozinka i ponovljena lozinka nisu jednake';
		}else
			$greska['iste_sifre'] = '';
	
		$naslov = 'Filip Jandrijevic - uređivanje profila';
		$smarty = new Smarty;
		$smarty->assign("user", $user);
		$smarty->assign("naslov", $naslov);
		$smarty->assign("ime", $row['ime']);
		$smarty->assign("prezime", $row['prezime']);
		$smarty->assign("email", $row['email']);
		$smarty->assign("username", $row['korisnicko_ime']);
		$smarty->assign("registracija", $registracija);
		$smarty->assign("greska", $greska);

		$smarty->assign("korisnik", $korisnik);
		$smarty->assign("tip", $tip);
		$smarty->assign("slika", $slika);
			
		$smarty->display("uredi_profil.tpl");
	}else{
		//
		$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$user'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$polje = array($row['user_id'], $row['korisnicko_ime'], $row['ime'], $row['prezime']);
		zapisi_u_dnevnik($polje);
		//
		header('Location: fijandrij_ispis.php?err=1');
		exit;
	}

?>