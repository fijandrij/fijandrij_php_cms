<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$naslov = 'Filip Jandrijevic - Administracija voditelja';
	$smarty = new Smarty;

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);


	$korisnik = $_SESSION['korisnik_ime'];
	$smarty->assign("korisnik", $korisnik);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	if(!isset($_SESSION['korisnik_id'])){
		header('Location: fijandrij_prijava.php?greska=1');
	}

	$korisnik_id = $_SESSION['korisnik_id'];

	$zajednica_id = $_GET['tr'];
	$smarty->assign("zajednica_id", $zajednica_id);


	$result = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE zajednica_id = '$zajednica_id' and korisnik_user_id = '$korisnik_id' and tip_korisnika = 2");

	if(mysql_num_rows($result) == 0 && $tip != 3){
		header('Location: fijandrij_ispis.php');		
	}

	//brišem zajednicu

	if(isset($_GET['remove'])){
		mysql_query("DELETE FROM korisnik_has_zajednica WHERE zajednica_id = '$zajednica_id'");
		mysql_query("DELETE FROM zajednica WHERE id = '$zajednica_id'");
		mysql_query("DELETE FROM troskovi WHERE zajednica_id = '$zajednica_id'");

		header('Location: fijandrij_zajednice.php');	

	}

	//brsanje obavljeno

	$smarty->assign("naslov", $naslov);

	$smarty->display("voditelj_administracija.tpl");
	
	mysql_close();
?>