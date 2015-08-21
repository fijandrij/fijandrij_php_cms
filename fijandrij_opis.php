<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$naslov = 'Filip Jandrijevic - opis projektnog rješenja';
	$smarty = new Smarty;

	$korisnik = $_SESSION['korisnik_ime'];
	$smarty->assign("korisnik", $korisnik);

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$smarty->assign("naslov", $naslov);	
	$smarty->display("fijandrij_opis.tpl");

?>