<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");


	$result = mysql_query("SELECT tip_troskova.naziv, troskovi.idtroskovi FROM kosarica INNER JOIN troskovi ON kosarica.troskovi_idtroskovi = troskovi.idtroskovi LEFT JOIN tip_troskova ON troskovi.tip_troskova_id = tip_troskova.id  WHERE korisnik_user_id = '{$_SESSION['korisnik_id']}' and troskovi.placen = 0");

	if(mysql_num_rows($result) > 0){
		header('Location: kosarica.php');			
	}else{

		$_SESSION = array();

		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time()-42000, '/');
		}

		session_destroy();

		header('Location: fijandrij_prijava.php?logout=1');		
	}


?>