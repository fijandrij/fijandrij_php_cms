<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$smarty = new Smarty;

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$zaj_id = $_GET['trosak'];

	if(isset($zaj_id) && !isset($_GET['idtr'])){

		$query = "SELECT troskovi.zajednica_id, troskovi.idtroskovi, troskovi.datum, troskovi.cijena, troskovi.opis, zajednica.naziv FROM troskovi INNER JOIN zajednica ON troskovi.zajednica_id = zajednica.id WHERE troskovi.zajednica_id = '$zaj_id' and placen = 1 ORDER BY troskovi.datum";
		$result = mysql_query($query);

		$i=0;

		while($row = mysql_fetch_array($result)){
			$red[$i] = $row;
			$i++;
		}

	}

	$res = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE korisnik_user_id =  '{$_SESSION['korisnik_id']}' and zajednica_id = '$zaj_id' and aktivan = 1 ");
	if(mysql_num_rows($res) > 0){
		$clan = true;
		$smarty->assign("clan", $clan);
	}

	if(isset($zaj_id) && isset($_GET['idtr'])){
		$result = mysql_query("SELECT troskovi.zajednica_id, troskovi.idtroskovi, troskovi.datum, troskovi.cijena, troskovi.opis, zajednica.naziv FROM troskovi INNER JOIN zajednica ON troskovi.zajednica_id = zajednica.id WHERE troskovi.zajednica_id = '$zaj_id' and idtroskovi = '{$_GET['idtr']}' and placen = 1 ORDER BY troskovi.datum");

		$i=0;

		while($row = mysql_fetch_array($result)){
			$red[$i] = $row;
			$i++;
		}
	}

	$smarty->assign('red', $red);
	header('Content-Type:text/xml');	
	$smarty->display("fijandrij_troskovi_xml.tpl");
	mysql_close();
?>