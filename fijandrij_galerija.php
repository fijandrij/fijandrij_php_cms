<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("recaptchalib.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	if(!isset($_SESSION['korisnik_id'])){
		header('Location: fijandrij_prijava.php?greska=1');
	}

	$naslov = 'Filip Jandrijevic - galerija';
	$smarty = new Smarty;

	$korisnik = $_SESSION['korisnik_ime'];
	
	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$mapa = "images/user/";
	$slike = glob($mapa . "*.*");
	$smarty->assign("slike",$slike);


	$smarty->assign("naslov", $naslov);
	$smarty->assign("korisnik", $korisnik);
	$smarty->display("fijandrij_galerija.tpl");
	
	mysql_close();
?>