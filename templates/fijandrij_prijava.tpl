{include file='header.tpl'}
			<div id = "content">
				<div class="sadrzaj">
					<h4>Prijava korisnika</h4> 
				</div>
				
				<div>
					<form method="post" action="fijandrij_prijava.php" id="prijava">	
						<table class="forma">
							<tr>
								<span class="error">{$greska.prijava_pogresna} {$greska.status_pogresan} {$greska.blokada} {$poruka} {$blokiran} {$greska.neprijavljen}<span>
								
							</tr>
							<tr>
								<td><label for="username">Korisničko ime: </label></td>
								<td><input type="text" name="username" id="username" {if isset($ime_korisnika)} value="{$ime_korisnika}" {/if}/><span class="username_greska"></span></td>
							</tr>
							<tr>
								<td><label for="password">Lozinka: </label></td>
								<td><input type="password" name="password" id="password"/><span class="lozinka_greska"></span></td>
							</tr>
							<tr>
								<td><label>Zapamti me: </label></td>
								<td><input type="checkbox" name="checkbox" value="1" id="terms" /></td>
							</tr>
										
							<tr>
								<td><input type="submit" name="submit" class="submit" value="Prijava" id="submit"/></td>
								<td><label><a href="zaboravljena_lozinka.php">Zaboravili ste lozinku?</a></label></td>
							</tr>
						</table>
					</form>
				</div>	
			</div>
{include file='footer.tpl'}