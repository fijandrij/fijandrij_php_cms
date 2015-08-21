<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$naslov = 'Filip Jandrijevic - Administracija voditelja';
	$smarty = new Smarty;

	$korisnik_id = $_SESSION['korisnik_id'];

	if(isset($_GET['zajednica_id']))
		$zajednica_id = $_GET['zajednica_id'];
	if(isset($_GET['zajid']))
		$zajednica_id = $_GET['zajid'];

	$smarty->assign('zajednica_id', $zajednica_id);

	//$result = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE zajednica_id = '$zajednica_id' and aktivan = 2");

	if(isset($_GET['id']) && isset($_GET['zajid'])){
		$id = $_GET['id'];	
		$zajedid = $_GET['zajid'];
		if($_GET['status'] == 1){
			mysql_query("UPDATE korisnik_has_zajednica SET aktivan = 1 WHERE korisnik_user_id = '$id' and zajednica_id = '$zajedid'");	
		}else if($_GET['status'] == 2){
			mysql_query("DELETE FROM korisnik_has_zajednica WHERE korisnik_user_id = '$id' and zajednica_id = '$zajedid'");
		}


	}

	$result = mysql_query("SELECT korisnik.user_id, korisnik.ime, korisnik.prezime, korisnik.korisnicko_ime FROM korisnik INNER JOIN korisnik_has_zajednica ON korisnik.user_id = korisnik_has_zajednica.korisnik_user_id WHERE korisnik_has_zajednica.zajednica_id = '$zajednica_id' and korisnik_has_zajednica.aktivan = 2 ORDER BY korisnik.ime");


	$i = 0;

	while($row = mysql_fetch_array($result)){
		$temp[$i] = $row;
		$i++;
	}
	
	$smarty->assign('temp', $temp);

	/*if(isset($_GET['id']) && isset($_GET['zajid'])){
		$id = $_GET['id'];	
		$zajedid = $_GET['zajid'];
		mysql_query("UPDATE korisnik_has_zajednica SET aktivan = 1 WHERE korisnik_user_id = '$id' and zajednica_id = '$zajedid'");

	}*/


	
	header('Content-Type:text/xml');
	$smarty->display("voditelj_administracija_xml.tpl");
	
	mysql_close();
?>