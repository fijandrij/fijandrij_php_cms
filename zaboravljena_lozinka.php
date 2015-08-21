<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");

	$naslov = 'Filip Jandrijevic - zaboravljena lozinka';
	$smarty = new Smarty;
	$smarty->assign("naslov", $naslov);
	
	$username = $_POST['username'];
	$email = $_POST['email'];

	$smarty->assign("username", $username);
	$smarty->assign("email", $email);

	if(!empty($email) && !empty($username)){

		$random_pw = random_password();

		$result = mysql_query("UPDATE korisnik SET lozinka = '$random_pw' WHERE korisnicko_ime = '$username'") or die(mysql_error());

		if($result){

			$to = $_POST['email'];
			$subject = 'Nova lozinka';
			$body = "Pozdrav, " . $_POST['username'] . " tvoja nova lozinka je: ". $random_pw;
		
			mail($to, $subject, $body);
			$greska['lozinka_ponovljena'] = 'Nova lozinka je poslana, molimo provjerite email';
		}else{
			$greska['lozinka_nije_ponovljena'] = 'Mail nije uspješno poslan';
		}
		
	}else{
		if(empty($email) && isset($_POST['submit']))
			$greska['email_ponovljeni'] = 'Molimo unesite email adresu';
			
		if(empty($username) && isset($_POST['submit']))
			$greska['username_ponovljeni'] = 'Molimo unesite korisničko ime';
	}

	$smarty->assign("greska", $greska);
	$smarty->display("zaboravljena_lozinka.tpl");
	mysql_close();
?>