<?php
	header('Content-Type:text/xml');
	echo '<?xml version="1.0" encoding="utf-8" ?>';
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	$ocjena = $_GET['ocjena'];
	$korisnik_id = $_GET['kor_id'];
	$idtr = $_GET['tr_id'];

	$nasao = mysql_query("SELECT troskovi_idtroskovi, korisnik_user_id, ocjena FROM ocjena WHERE troskovi_idtroskovi = '$idtr' AND korisnik_user_id = '$korisnik_id' ");

	if(mysql_num_rows($nasao) > 0 ){
		mysql_query("UPDATE ocjena SET ocjena = '$ocjena' WHERE troskovi_idtroskovi = '$idtr' AND korisnik_user_id = '$korisnik_id'");
	}else{
		mysql_query("INSERT INTO ocjena (troskovi_idtroskovi, korisnik_user_id, ocjena) VALUES ('$idtr', '$korisnik_id', '$ocjena')");	
	}
	 
	 mysql_close();
?>