<?php
	header('Content-Type:text/xml');
	echo '<?xml version="1.0" encoding="utf-8" ?>';
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	$username = mysql_real_escape_string($_GET['username']);
	$result = mysql_query("SELECT * FROM korisnik WHERE korisnicko_ime = '$username'");  
	   

	if(mysql_num_rows($result) > 0){  
	    echo '<broj>' . 0 . '</broj>';  
	}else{  
		echo '<broj>' . 1 . '</broj>';   
	} 
?>