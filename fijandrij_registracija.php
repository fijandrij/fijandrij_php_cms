<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	require_once("recaptchalib.php");

	$korisnik = $_SESSION['korisnik_ime'];

	$tip = $_SESSION['korisnik_tip'];

	$slika = $_SESSION['korisnik_slika'];

	if(!isset($korisnik)){

		$publickey = '6LdNnNASAAAAAA3me_Xk0JX2yvMdxHfBxXBnXGA4';
		$captcha = recaptcha_get_html($publickey);

		$naslov = 'Filip Jandrijevic - registracija';
		$smarty = new Smarty;
		$smarty->assign("naslov", $naslov);
		$smarty->assign("ime", $ime);
		$smarty->assign("prezime", $prezime);
		$smarty->assign("email", $email);
		$smarty->assign("username", $username);
		$smarty->assign("registracija", $registracija);
		$smarty->assign("greska", $greska);
		$smarty->assign("tip", $tip);
		$smarty->assign("slika", $slika);

		$smarty->assign("captcha",$captcha);
		
		$smarty->display("fijandrij_registracija.tpl");

	}else{
		header('Location: fijandrij_ispis.php');
		exit;
	}

?>