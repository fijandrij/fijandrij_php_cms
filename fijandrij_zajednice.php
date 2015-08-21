<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");


	$naslov = 'Filip Jandrijević - ispis zajednica';
	$smarty = new Smarty;

	$korisnik = $_SESSION['korisnik_ime'];
	$smarty->assign("korisnik", $korisnik);

	$korisnik_id = $_SESSION['korisnik_id'];
	$smarty->assign("korisnik_id", $korisnik_id);

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$smarty->assign("naslov", $naslov);

	if(isset($tip) && $tip == 1){
		$zahtjev = 1;
		$smarty->assign("zahtjev", $zahtjev);
	}

	if(isset($_GET['kreiraj']) &&  isset($korisnik)){
		$kreiraj = 1;
		$smarty->assign("kreiraj", $kreiraj);
	}

	$tip_troska = mysql_query("SELECT * FROM tip_troskova");
	$k = 0;
	while($red = mysql_fetch_array($tip_troska)){
		$r[$k] = $red;
		$k++;
	}

	$smarty->assign('red_troska', $r);

	if(isset($_POST['submit'])){
		$ime_zajednice = $_POST['zajednica'];
		$opis_zajednice = $_POST['opis'];
		mysql_query("INSERT INTO zajednica (naziv, opis) VALUES('$ime_zajednice', '$opis_zajednice')"); //unos podataka u tablicu zajednica

		/*if(isset($_POST['trosak']) && empty($_POST['tip_troska'])){
			//mysql_query("INSERT INTO tip_troskova (naziv) VALUES('{$_POST['trosak']}')");
			$rezz_tip = mysql_query("SELECT * FROM tip_troskova WHERE naziv = '{$_POST['trosak']}'");
			$row_trosak = mysql_fetch_array($rezz_tip);
		}else{
			mysql_query("INSERT INTO tip_troskova (naziv) VALUES('{$_POST['tip_troska']}')");
			$rezz_tip = mysql_query("SELECT * FROM tip_troskova WHERE naziv = '{$_POST['tip_troska']}'");
			$row_trosak = mysql_fetch_array($rezz_tip);	
		}*/

		$rezz = mysql_query("SELECT * FROM zajednica WHERE naziv = '$ime_zajednice' and opis = '$opis_zajednice'");
		$row = mysql_fetch_array($rezz);
		mysql_query("INSERT INTO korisnik_has_zajednica (korisnik_user_id, zajednica_id, opis, tip_korisnika, aktivan) VALUES('$korisnik_id', '{$row['id']}', '$opis_zajednice', 2, 1)"); //unos podataka u korisnik_has_zajednica

		//mysql_query("INSERT INTO troskovi (tip_troskova_id, zajednica_id, datum, cijena, opis) VALUES('{$row_trosak['id']}', '{$row['id']}', '{$_POST['datum']}', '{$_POST['cijena_troska']}', '{$_POST['opis_troska']}')");*/
	}
	
	$smarty->display("fijandrij_zajednice.tpl");
	
	mysql_close();
?>