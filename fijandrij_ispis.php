<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("recaptchalib.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	if(!isset($_SESSION['korisnik_id'])){
		header('Location: fijandrij_prijava.php?greska=1');
	}

	$naslov = 'Filip Jandrijevic - ispis korisnika';
	$smarty = new Smarty;

	$error = $_GET['err'];


	if($error == 1){
		$error = 'Učinili ste nedozvoljenu radnju, vaš pokušaj je zabilježen';	
		$smarty->assign("error", $error);
	}

	$korisnik = $_SESSION['korisnik_ime'];
	
	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$stranica = $_GET['page'];

	if(!isset($_GET['page'])){
		
		$stranica = 1;
	}

	$smarty->assign("stranica", $stranica);

	$ispis = korisnik_ispis(($stranica-1)*10);

	$broj_str = ceil(mysql_num_rows(mysql_query("SELECT * FROM korisnik"))/10);

	$smarty->assign("broj_str", $broj_str);
	$smarty->assign("naslov", $naslov);
	$smarty->assign("korisnik", $korisnik);
	$smarty->assign("ispis", $ispis);
	$smarty->display("fijandrij_ispis.tpl");
	
	mysql_close();
?>