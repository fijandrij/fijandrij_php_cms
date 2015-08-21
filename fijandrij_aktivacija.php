<?php 
	require_once("includes/connection.php");
	require_once("includes/functions.php"); 

	$token = $_GET['token'];
	if(ispravan_token($token) && (($token + 60*60*24) > time())){
		korisnik_aktivan($token);
		header('Location: fijandrij_ispis.php');
		exit;
	}

	mysql_close();

 ?>
