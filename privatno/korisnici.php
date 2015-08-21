<?php
	require_once("../includes/connection.php");
	require_once("../includes/functions.php");

	$result = mysql_query("SELECT korisnik.korisnicko_ime, korisnik.lozinka, tip_korisnika.naziv FROM korisnik LEFT JOIN tip_korisnika ON korisnik.tip_korisnika_id = tip_korisnika.id");
	echo "<table><tr><td>Username</td><td>Lozinka</td><td>Tip</td></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td>" . $row['korisnicko_ime'] . "</td><td>" . $row['lozinka'] . "</td><td>" . $row['naziv'] . "</td></tr>";
	}
	echo "</table>";
	mysql_close();
?>