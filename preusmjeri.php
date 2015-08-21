<?php
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$naslov = 'Filip Jandrijevic - registracija';
	$smarty = new Smarty;
	$smarty->assign("naslov", $naslov);
	$smarty->assign("registracija", $registracija);
	
	
	$smarty->display("preusmjeri.tpl");

?>