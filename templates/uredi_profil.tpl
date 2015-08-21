{include file='header.tpl'}

			<div id = "content">

				<div class="sadrzaj">

					<h4>Registracija korisnika</h4> 

				</div>

				<div class = "podaci">

					<form method="post" action="obrada.php" enctype="multipart/form-data">	

						<table class="forma">

							<tr>
								<span class="error">{$greska.iste_sifre}</span><br>
								
								<td><label for="ime">Ime: </label></td>

								<td><input type="text" name="ime" id="ime" {if isset($ime)} value="{$ime}"{/if} /><span class="error">{$greska.ime}</span></td>
								<td><input type="hidden" name="kor_ime" {if isset($user)}value="{$user}" 
																		{else} value="{$korisnik}" {/if} />

							</tr>

							<tr>

								<td><label for="prezime">Prezime: </label></td>

								<td><input type="text" name="prezime" id="prezime" {if isset($prezime)} value="{$prezime}"{/if}/><span class="error">{$greska.prezime}</span></td>

							</tr>

							<tr>

								<td><label for="email">Email: </label></td>

								<td><input type="text" name="email" id="email" {if isset($email)} value="{$email}"{/if} /><span class="error">{$greska.email}</span></td>

							</tr>

							<tr>

								<td><label for="username">Korisničko ime: </label></td>

								<td><input type="text" name="username" id="username" {if isset($username)} value="{$username}"{/if}/><span class="error">{$greska.username}</span></td>

							</tr>

							<tr>

								<td><label for="password">Lozinka: </label></td>

								<td><input type="password" name="password" id="password"/><span class="error">{$greska.password}</span></td>

							</tr>

							<tr>

								<td><label for="password_check">Potvrda lozinke: </label></td>

								<td><input type="password" name="password_check" id="password_check"/><span class="error"> {$greska.password_check} </span></td>

							</tr>

							<tr>
								<td><label for="file">Izaberite sliku:</label></td>
								<td><input type="file" name="upload_slike" id="file"><span class="error">{$greska.file_upload} {$greska.krivi_format} </span></td>
							</tr>	
							{if $tip eq 3}
								<tr>
									<td><label for="obrisati">Obriši račun:</label></td>
									<td><input type="checkbox" name="obrisati" id="obrisati"></td>
								</tr>
								{if !isset($blokiran)}
									<tr>
										<td><label for="blokiraj">Blokiraj račun:</label></td>
										<td><input type="checkbox" name="blokiraj" id="blokiraj"></td>
									</tr>
								{/if}
							{/if}
							{if isset($blokiran)}
							<tr>
								<td><label for="otkljucaj">Otkljucaj račun:</label></td>
								<td><input type="checkbox" name="otkljucaj" id="otkljucaj"></td>
							</tr>
							{/if}	
							<tr>
								<td><input type="submit" name="submit1" class="submit" value="Potvrdi"/></td>

							</tr>

						</table>

					</form>

				</div>	

			</div>

{include file='footer.tpl'}