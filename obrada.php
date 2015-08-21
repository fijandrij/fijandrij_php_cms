<?php
	require_once("includes/session.php");  
	require_once("includes/connection.php");
	require_once('recaptchalib.php');
	require_once("includes/functions.php");

	$privatekey = '6LdNnNASAAAAAHbtkN9REiJy5p5j0a-PEKQFLamY';
	$captcha = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if(isset($_POST['password']) || isset($_POST['username'])){

		$ime = $_POST['ime'];
		$user = $_POST['kor_ime'];
		$prezime = $_POST['prezime'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_check = $_POST['password_check'];
		//deklaracija varijabli za upload slike
		$name = $_FILES['upload_slike']['name'];
		$type = $_FILES['upload_slike']['type'];
		$temp = $_FILES['upload_slike']['tmp_name'];
		$upload_error = $_FILES['upload_slike']['error'];
 		
 		$name = $username . '_' . $name; //definiranje imena osobne slike korisnika tako da ne dode do ponavljanja

		$uploaddir = 'images/user/';
		$uploadfile = $uploaddir . $name;	

		if(($type == "image/gif" || $type == "image/png" || $type == "image/jpg" || $type == "image/jpeg") && empty($greska)){
			move_uploaded_file($temp, $uploadfile);
		}else if(($type != "image/gif" && $type != "image/png" && $type != "image/jpg" && $type != "image/jpeg") && !empty($type)){
			$greska['krivi_format'] = ' *Molimo učitajte sliku formata .jpg, .png ili .gif';
		}


		if(isset($_SESSION['korisnik_ime'])){
			
			$result = mysql_query("SELECT * FROM korisnik WHERE korisnicko_ime = '$user'");

			$row = mysql_fetch_array($result);

			if($row['ime'] != $ime)
				mysql_query("UPDATE korisnik SET ime = '$ime' WHERE korisnicko_ime = '$user'") or die(mysql_error());
			if($row['prezime'] != $prezime)
				mysql_query("UPDATE korisnik SET prezime = '$prezime' WHERE korisnicko_ime = '$user'") or die(mysql_error());
			if($row['email'] != $email)
				mysql_query("UPDATE korisnik SET email = '$email' WHERE korisnicko_ime = '$user'") or die(mysql_error());
			if(($row['lozinka'] != $password) && !empty($password)){
				if($password == $password_check){
					mysql_query("UPDATE korisnik SET lozinka = '$password' WHERE korisnicko_ime = '$user'") or die(mysql_error());
				}else{
					$error = 1;
				}	
			}

			if(isset($_POST['otkljucaj'])){
				mysql_query("UPDATE korisnik SET neuspjesne_prijave = 0 WHERE korisnicko_ime = '$user'") or die(mysql_error());
			}

			if(isset($_POST['blokiraj'])){
				mysql_query("UPDATE korisnik SET neuspjesne_prijave = 3 WHERE korisnicko_ime = '$user'") or die(mysql_error());
			}

			if(isset($_POST['obrisati'])){
				mysql_query("DELETE FROM korisnik WHERE korisnicko_ime = '$user'") or die(mysql_error());
				header('Location: fijandrij_ispis.php');
				exit;
			}
			
			if(isset($error)){
				header('Location: uredi_profil.php?user=' . $user . '&err='. $error);
			}else{
				header('Location: uredi_profil.php?user=' . $user);
			}

		}else{	


			if (!$captcha->is_valid) {
				$greska['captcha'] = "Pogrešan unos CAPTCHA provjere";
			}

			if(empty($ime)){
				$greska['ime'] = ' *Molimo unesite svoje ime';
			}
			if(empty($prezime)){
				$greska['prezime'] = ' *Molimo unesite svoje prezime';
			}
			if(empty($email)){
				$greska['email'] = ' *Molimo unesite svoju elektroničku poštu';
			}
			if(empty($username)){
				$greska['username'] = ' *Molimo unesite svoje korisnicko ime';
			}
			if(empty($password)){
				$greska['password'] = ' *Molimo unesite svoju lozinku';
			}
			if(empty($password_check)){
				$greska['password_check'] = ' *Molimo ponovite lozinku';
			}

			if(!korisnik_postoji($username)){
				$greska['postoji_user'] = ' *Ovaj korisnik već postoji u bazi';
			}

			if(!password_ispit($password)){
				$greska['kriva_lozinka'] = ' *Lozinka mora sadržavati barem jedno veliko slovo, jedno malo, broj te posebne znakove (#, !, . i sl.)';
			}

			if($password != $password_check){
				$greska['razlicita_lozinka'] = ' *Lozinka i ponovljena lozinka nisu jednake';
			}


			if(isset($greska)){
				include("fijandrij_registracija.php");
			}else{

				$user_activation = time();
	 
				$unos_podataka = unos_korisnika(1, 2, $username, $password, $ime, $prezime, $email, 'images/user/'. $name, $user_activation);
					
				if($unos_podataka){
			
					if(email($email, $user_activation)){
						$registracija['uspjeh'] = 'Vasa prijava je uspjesna, molimo provjerite mail za aktivaciju racuna';
						include("preusmjeri.php");
						//header('Location: fijandrij_ispis.php');
						//exit;
					}else{
						echo 'mail nije uspješno poslan';
					}
				}else{
					echo 'doslo je do pogreske prilikom unosa podataka u bazu';
				}
			}
		}	

		}else{
			header('Location: fijandrij_registracija.php');
			exit;
		}
	

mysql_close();
?>