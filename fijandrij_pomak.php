<?php
	require_once("includes/session.php"); 
	require_once("includes/connection.php");
	require_once("recaptchalib.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	require_once ('ajaxCRUD/preheader.php');
	include ('ajaxCRUD/ajaxCRUD.class.php');

	if(!isset($_SESSION['korisnik_id'])){
		header('Location: fijandrij_prijava.php?greska=1');
	}

	$korisnik = $_SESSION['korisnik_ime'];

	$naslov = 'Filip Jandrijevic - ispis korisnika';
	$smarty = new Smarty;

	$tip = $_SESSION['korisnik_tip'];
	$smarty->assign("tip", $tip);	

	$slika = $_SESSION['korisnik_slika'];
	$smarty->assign("slika", $slika);

	$url = 'http://arka.foi.hr/PzaWeb/PzaWeb2004/config/pomak.xml';

	if($_GET['uzmi'] == 'pomak'){
		$return_pomak = pomak($url);
		$smarty->assign("return", $return_pomak);
	}

	$time = date("Y.m.d.-H:i:s", time());
	$vrijeme = date("Y.m.d.-H:i:s", vrijeme());
	$smarty->assign("vrijeme", $vrijeme);
	$smarty->assign("time", $time);
	$smarty->assign("naslov", $naslov);
	$smarty->assign("korisnik", $korisnik);

	$opcije = array("korisnik","zajednica","komentari","korisnik_has_zajednica","kosarica","ocjena","predlosci","status_korisnika","tip_korisnika","tip_predloska","tip_troskova","troskovi");
	$smarty->assign("opcije",$opcije);

	if (isset($_POST['ok'])) {
		$t = $_POST['tb'];
		switch ($t) {
			case "korisnik": $cru_korisnik = new ajaxCRUD("Korisnik", "korisnik", "user_id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("status_korisnika_id_status","Status");
							 $cru_korisnik->displayAs("tip_korisnika_id","Tip");
							 #$cru_korisnik->setLimit(10);
							 $cru_korisnik->showTable();
							 break;
			case "komentari": $cru_korisnik = new ajaxCRUD("Komentar", "komentari", "id_komentar", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("komentari_id_komentar","Podkomentar");
							 $cru_korisnik->displayAs("troskovi_idtroskovi","Id troskovi");
							 $cru_korisnik->displayAs("korisnik_user_id","Id korisnik");
							 $cru_korisnik->showTable();
							 break;
			case "korisnik_has_zajednica": $cru_korisnik = new ajaxCRUD("korisnik_has_zajednica", "korisnik_has_zajednica", "korisnik_user_id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("tip_korisnika","Tip korisnika");
							 $cru_korisnik->displayAs("zajednica_id","Id zajednice");
							 $cru_korisnik->showTable();
							 break;
			case "kosarica": $cru_korisnik = new ajaxCRUD("Kosarica", "kosarica", "id_kosarica", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("troskovi_idtroskovi","Id troskova");
							 $cru_korisnik->displayAs("korisnik_user_id","Id korisnika");
							 $cru_korisnik->showTable();
							 break;
			case "ocjena": $cru_korisnik = new ajaxCRUD("Ocjena", "ocjena", "id_ocjena", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("troskovi_idtroskovi","Id troskova");
							 $cru_korisnik->displayAs("korisnik_user_id","Id korisnika");
							 $cru_korisnik->showTable();
							 break;
			case "predlosci": $cru_korisnik = new ajaxCRUD("Predlosci", "predlosci", "id_predlosci", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("tip_predloska_id","Tip predloska");
							 $cru_korisnik->displayAs("troskovi_idtroskovi","Id troskova");
							 $cru_korisnik->displayAs("korisnik_user_id","Id korisnika");
							 $cru_korisnik->showTable();
							 break;
			case "status_korisnika": $cru_korisnik = new ajaxCRUD("Status korisnika", "status_korisnika", "id_status", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->showTable();
							 break;
			case "tip_korisnika": $cru_korisnik = new ajaxCRUD("Tip korisnika", "tip_korisnika", "id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->showTable();
							 break;
			case "tip_predloska": $cru_korisnik = new ajaxCRUD("Tip predloska", "tip_predloska", "id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->showTable();
							 break;
			case "tip_troskova": $cru_korisnik = new ajaxCRUD("Tip troskova", "tip_troskova", "id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->showTable();
							 break;
			case "troskovi": $cru_korisnik = new ajaxCRUD("Troskovi", "troskovi", "idtroskovi", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("tip_troskova_id","Tip troska");
							 $cru_korisnik->displayAs("zajednica_id","Id zajednice");
							 $cru_korisnik->showTable();
							 break;
			case "zajednica": $cru_korisnik = new ajaxCRUD("Zajednica", "zajednica", "id", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->showTable();
							 break;
		}
	}

	$smarty->display("fijandrij_pomak.tpl");
	
	mysql_close();
?>