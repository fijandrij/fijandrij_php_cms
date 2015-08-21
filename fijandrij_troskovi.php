<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");


	$naslov = 'Filip Jandrijević - troškovi';
	$smarty = new Smarty;

	$korisnik = $_SESSION['korisnik_ime'];
	$smarty->assign("korisnik", $korisnik);

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$smarty->assign("naslov", $naslov);

	$trosak = $_GET['trosak'];
	$smarty->assign("trosak", $trosak);

	if(isset($_GET['kreiraj']) &&  isset($korisnik)){
		$kreiraj = 1;
		$smarty->assign("kreiraj", $kreiraj);
	}

	$result = mysql_query("SELECT * FROM korisnik_has_zajednica WHERE korisnik_user_id =  '{$_SESSION['korisnik_id']}' and zajednica_id = '$trosak' and aktivan = 1 ");
	if(mysql_num_rows($result) > 0){
		$clan = true;
		$smarty->assign("clan", $clan);
	}

	$tip_troska = mysql_query("SELECT * FROM tip_troskova");
	$k = 0;
	while($red = mysql_fetch_array($tip_troska)){
		$r[$k] = $red;
		$k++;
	}

	$smarty->assign('red_troska', $r);


	if(isset($_POST['submit'])){

		if(isset($_POST['trosak']) && empty($_POST['tip_troska'])){
			$rezz_tip = mysql_query("SELECT * FROM tip_troskova WHERE naziv = '{$_POST['trosak']}'");
			$row_trosak = mysql_fetch_array($rezz_tip);
		}else{
			mysql_query("INSERT INTO tip_troskova (naziv) VALUES('{$_POST['tip_troska']}')");
			$rezz_tip = mysql_query("SELECT * FROM tip_troskova WHERE naziv = '{$_POST['tip_troska']}'");
			$row_trosak = mysql_fetch_array($rezz_tip);	
		}

		mysql_query("INSERT INTO troskovi (tip_troskova_id, zajednica_id, datum, cijena, placen, opis) VALUES('{$row_trosak['id']}', '$trosak', '{$_POST['datum']}', '{$_POST['cijena_troska']}', 0, '{$_POST['opis_troska']}')");

		//rad s kosaricom

		$kos_rez = mysql_query("SELECT * FROM troskovi WHERE tip_troskova_id = '{$row_trosak['id']}' and zajednica_id = '$trosak' and cijena = '{$_POST['cijena_troska']}'");

		while($kosarica = mysql_fetch_array($kos_rez)){
			$ajdi = $kosarica['idtroskovi'];
		}

		mysql_query("INSERT INTO kosarica (troskovi_idtroskovi, korisnik_user_id) VALUES ('$ajdi', '{$_SESSION['korisnik_id']}')");

		$_SESSION['kosarica'] = 1;

		//gotov rad s kosaricom
	}

	
	$smarty->display("fijandrij_troskovi.tpl");
	
	mysql_close();
?>