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

	$kid = $_SESSION['korisnik_id'];
	$smarty->assign("kid", $kid);

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$smarty->assign("naslov", $naslov);

	$trosak = $_GET['trosak'];
	$smarty->assign("trosak", $trosak);

	if(isset($_GET['idtr'])){
		$idtr = $_GET['idtr'];
		$_SESSION['id_troska'] = $idtr;
		$smarty->assign('idtr', $idtr);
	}
	

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

	if(isset($trosak) && isset($_GET['idtr'])){


		if(isset($_POST['submit'])){
			mysql_query("INSERT INTO komentari (troskovi_idtroskovi, korisnik_user_id, komentar) VALUES ('$idtr', '{$_SESSION['korisnik_id']}', '{$_POST['komentar']}')");	
		}

		$result = mysql_query("SELECT troskovi.zajednica_id, troskovi.idtroskovi, troskovi.datum, troskovi.cijena, troskovi.opis, zajednica.naziv FROM troskovi INNER JOIN zajednica ON troskovi.zajednica_id = zajednica.id WHERE troskovi.zajednica_id = '$trosak' and idtroskovi = '{$_GET['idtr']}' and placen = 1 ORDER BY troskovi.datum");

	
		$row = mysql_fetch_array($result);
		$smarty->assign('row', $row);

		//komentari

		//$rez = mysql_query("SELECT * FROM komentari WHERE troskovi_idtroskovi = '{$_GET['idtr']}'");
		$rez = mysql_query("SELECT komentari.komentar, korisnik.korisnicko_ime FROM komentari INNER JOIN korisnik ON komentari.korisnik_user_id = korisnik.user_id WHERE troskovi_idtroskovi = '{$_GET['idtr']}'");

		$i=0;

		while($r = mysql_fetch_array($rez)){
			$kom[$i] = $r;
			$i++;
		}

		$smarty->assign('kom', $kom);

		//komentari //

		//ocjena
		//$ocj = mysql_query("SELECT * FROM ocjena WHERE troskovi_idtroskovi = '$idtr' AND korisnik_user_id = '{$_SESSION['korisnik_id']}' ");
		$ocj = mysql_query("SELECT AVG(ocjena) AS prosjek FROM ocjena WHERE troskovi_idtroskovi = '$idtr'");
		$ocje = mysql_fetch_array($ocj);
		$var = $ocje['prosjek'];
		$smarty->assign('ocjena', $var);
		//ocjena


	}


	$smarty->display("troskovi_komentari.tpl");
	
	mysql_close();
?>