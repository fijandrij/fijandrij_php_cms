<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");


	$naslov = 'Filip Jandrijević - sadržaj košarice';
	$smarty = new Smarty;

	$korisnik = $_SESSION['korisnik_ime'];
	$smarty->assign("korisnik", $korisnik);

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	if(!isset($_SESSION['korisnik_id'])){
		header('Location: fijandrij_prijava.php?greska=1');
	}


	$smarty->assign("naslov", $naslov);

	
	if(isset($_GET['id']) && isset($_GET['brisi'])){
		mysql_query("DELETE FROM troskovi WHERE idtroskovi = '{$_GET['id']}'");
	}else if(isset($_GET['id']) && !isset($_GET['brisi'])){
		mysql_query("UPDATE troskovi SET placen = 1 WHERE idtroskovi = '{$_GET['id']}'");
	}

	$result = mysql_query("SELECT tip_troskova.naziv, troskovi.idtroskovi FROM kosarica INNER JOIN troskovi ON kosarica.troskovi_idtroskovi = troskovi.idtroskovi LEFT JOIN tip_troskova ON troskovi.tip_troskova_id = tip_troskova.id  WHERE korisnik_user_id = '{$_SESSION['korisnik_id']}' and troskovi.placen = 0");

	$i = 0;

	while($row = mysql_fetch_array($result)){
		$r[$i] = $row;
		$i++;
	}

	$smarty->assign('row', $r);

	
	$smarty->display("kosarica.tpl");
	
	mysql_close();
?>