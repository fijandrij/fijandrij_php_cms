<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$smarty = new Smarty;

	$korisnik_tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $korisnik_tip);
	$korisnik_id = $_SESSION['korisnik_id'];

	if(isset($korisnik_tip) && ($korisnik_tip == 1 || $korisnik_tip == 3)){
		$zahtjev = 1;
		$smarty->assign("zahtjev", $zahtjev);
	}

	


	$query = "SELECT * FROM zajednica";

	$result = mysql_query($query);

	$i=0;

	while($row = mysql_fetch_array($result)){
		$red[$i] = $row;
		$temp = mysql_query("SELECT AVG(cijena) AS prosjek FROM troskovi WHERE zajednica_id = '{$row['id']}' AND placen = 1");
		$t = mysql_fetch_array($temp);
		$red[$i]['prosjek'] = $t['prosjek'];
		$i++;
	}


	$zahtjev_id = $_GET['id'];

	if(isset($zahtjev_id)){
		if(!isset($_GET['n'])){
			mysql_query("INSERT INTO korisnik_has_zajednica (korisnik_user_id, zajednica_id, tip_korisnika, aktivan) VALUES('$korisnik_id', '$zahtjev_id', 1, 2)");	
		}else{
			mysql_query("DELETE FROM korisnik_has_zajednica WHERE korisnik_user_id = '$korisnik_id' and zajednica_id = '$zahtjev_id'");
		}
					
	}

	//$rez = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE korisnik_user_id='$korisnik_id' and aktivan = 1"); //zadnje izmjene na aktivan = 1

	$rez = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE korisnik_user_id='$korisnik_id'");

	$j=0;

	while($p = mysql_fetch_array($rez)){
		$zajednica[$j] = $p;
		$j++;
	}

	$smarty->assign('zaj', $zajednica);
	$smarty->assign('red', $red);
	header('Content-Type:text/xml');	
	$smarty->display("fijandrij_zajednice_xml.tpl");
	mysql_close();
?>