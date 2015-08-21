<?php

	function korisnik_postoji($username){
		$query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$username'";
		$result = mysql_query($query);

		if(mysql_num_rows($result) != 0){
			return FALSE;
		}
		return TRUE;
	}

	function password_ispit($pw){
		if(preg_match("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!\"#$%&/()=?*]).{6,20})", $pw)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function unos_korisnika($tip, $status, $kor_ime, $pass, $ime, $prez, $email, $slika, $akt_kod){

		$kor_ime = mysql_real_escape_string($kor_ime);
		$pass = mysql_real_escape_string($pass); 

		$query = "INSERT INTO korisnik(tip_korisnika_id, status_korisnika_id_status, korisnicko_ime, lozinka, ime, prezime, email, slika, aktivacijski_kod) VALUES('$tip', '$status', '$kor_ime', '$pass', '$ime', '$prez', '$email', '$slika', '$akt_kod')";

		$result = mysql_query($query) or die("Problemi kod unosa korisnika");

		if($result)
			return TRUE;
		return FALSE;
	}

	function email($adress, $activation_code){

		$to = $adress;
		$subject = 'Aktivacija racuna';
		$body = "Za aktivaciju vaseg racuna kliknite na http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_031/fijandrij/fijandrij_aktivacija.php?token=$activation_code";
		
		if (mail($to, $subject, $body)) {
   			return TRUE;
  		}
  		return FALSE;		

	}

	function ispravan_token ($token){
		$query = "SELECT * FROM korisnik WHERE aktivacijski_kod = '$token'";
		$result = mysql_query($query);

		if(mysql_num_rows($result) != 0){
			return TRUE;
		}
		return FALSE;
	}

	function korisnik_aktivan($token){
		$query = "UPDATE korisnik SET status_korisnika_id_status = 1 WHERE aktivacijski_kod = '$token'";
		$result = mysql_query($query);

		if($result)
			return TRUE;
		else
			return FALSE;
	}

	function mail_hide(){
		$mailhide_pubkey = '01AMxw59-l924QoCHRsacQYQ==';
		$mailhide_privkey = '40d240bce3cff7777a5c11a3fc5cf547';
		$query = "SELECT email FROM korisnik";
		$result = mysql_query($query);
		$br=0;
		while($row = mysql_fetch_array($result)){
			$mail_encod[$br] = recaptcha_mailhide_html($mailhide_pubkey, $mailhide_privkey, $row['email']);
			$br++;
		}
		return $mail_encod;
	}

	function korisnik_ispis($stranica){
		$query = "SELECT korisnicko_ime, ime, prezime, email, slika FROM korisnik LIMIT $stranica, 10";
		$result = mysql_query($query);

		$output = "<table id=\"korisnici\" border=\"0\"><tr>";
		$output .= "<tr><th> Ime </th><th> Prezime </th><th> Korisničko ime </th>
						<th> Email </th><th> Slika </th><tr>";
		$array = mail_hide();
	

		while($row = mysql_fetch_array($result)){

			if(isset($_SESSION['korisnik_tip']) && $_SESSION['korisnik_tip'] == 3){

				$output .= "<tr><td><a href=\"uredi_profil.php?user={$row['korisnicko_ime']}\"><img src=\"images/folder.gif\" /></a>  {$row['ime']} </td><td> {$row['prezime']} </td><td> {$row['korisnicko_ime']} </td>
						<td> {$array[$stranica]} </td><td><img src=\"{$row['slika']}\" width=\"50px\" height=\"40px\"></img> </td><tr>";
			}else{
				
				$output .= "<tr><td> {$row['ime']} </td><td> {$row['prezime']} </td><td> {$row['korisnicko_ime']} </td>
						<td> {$array[$stranica]} </td><td><img src=\"{$row['slika']}\" width=\"50px\" height=\"40px\"></img> </td><tr>";

			}

			$stranica++;
		}

		$output .= "</table>";

		return $output;
	}


	function pomak($url) { //zapisujem pomak u datoteku
		 if(!($file = @fopen($url,'r'))) {
			  $greska = 'Došlo je do pogreške prilikom pomaka vremena';
			  return $greska;
		 }

		 $xml = fread($file, 1000);
		 fclose($file);
		 $dat = new DOMDocument;
		 $dat->loadXML($xml);
		 $pom = $dat->getElementsByTagName('pomak');
		 foreach ($pom as $p) {
		  	$atribut = $p->attributes;
		  	foreach ($atribut as $attr => $vrijednost) {
		   		if ($attr == "brojSati") {
		        	$pomak = $vrijednost->value;
		   		}
		  	}
		 }

		 $file = fopen("virtualno_vrijeme/fijandrij_pomak.xml",'w');

		 fwrite($file,$xml);
		 fclose($file);
		 return $pomak;
	}

	function random_password(){
		$length = 9;
		$password = "";
		$possible = "qwerYXtzopaIOPAsdfghjklyxcvb#$nmQWERTZUSDFGHJKuiLCVBNM1234567890!%&";
		$maxlength = strlen($possible);

		if ($length > $maxlength) {
      		$length = $maxlength;
    	}

   		 $i = 0; 
   
    	while ($i < $length) { 

	     	$char = substr($possible, mt_rand(0, $maxlength-1), 1);
	        
	      // have we already used this character in $password?
	      	if (!strstr($password, $char)) { 
	        	$password .= $char;
	        	$i++;
	      	}

   		}

    	return $password;



	}


	function vrijeme() { //cupam vrijeme iz datoteke van
 		if (!($file = @fopen("virtualno_vrijeme/fijandrij_pomak.xml",'r'))) {
  			$pomak = 0;
 		}else{
  			$xml = fread($file, 10000);
  			fclose($file);
  			$dat = new DOMDocument;
  			$dat->loadXML($xml);
  			$pom = $dat->getElementsByTagName('pomak');
  			foreach ($pom as $p) {
   				$atribut = $p->attributes;
   				foreach ($atribut as $attr => $vrijednost) {
    				if ($attr == "brojSati") {
         			$pomak = $vrijednost->value;
   					}
   				}
  			}
 		}
  		$pomak = time() + ($pomak*60*60);
 
 		return $pomak;
	}

	function zapisi_u_dnevnik($korisnik) {
 		$datoteka = "virtualno_vrijeme/dnevnik.txt";
 		$dat = fopen($datoteka,'a');
 		$zapis = date("Y.m.d.-H:i:s",vrijeme()).";";
 		foreach ($korisnik as $k) {
  			$zapis = $zapis."$k".";";
 		}
 		$zapis = $zapis."\n";
 		fwrite($dat,$zapis);
 		fclose($dat);
	}


?>