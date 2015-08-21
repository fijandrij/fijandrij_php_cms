<?php
	require_once("constants.php");

	$connect = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());

	$select_db = mysql_select_db(DB_NAME) or die(mysql_error());

	mysql_query("set names utf8");

?>