{include file='header.tpl'}

			<div id = "content">

				<div class="sadrzaj">

					<h4>Registracija korisnika</h4> 

				</div>

				<div class = "podaci">

					<form method="post" action="obrada.php" enctype="multipart/form-data" id="registracija">	

						<table class="forma">

							<tr>
								<span class="error">{$greska.postoji_user}</span><br>
								<span class="error">{$greska.kriva_lozinka}</span><br>
								<span class="error">{$greska.razlicita_lozinka}</span>
								<span class="error">{$greska.captcha}</span>
								
								<td><label for="ime">Ime: </label></td>

								<td><input type="text" name="ime" id="ime" {if isset($ime)} value="{$ime}"{/if} /><span class="error">{$greska.ime}</span><span class="error_ime"></span></td>

							</tr>

							<tr>

								<td><label for="prezime">Prezime: </label></td>

								<td><input type="text" name="prezime" id="prezime" {if isset($prezime)} value="{$prezime}"{/if}/><span class="error">{$greska.prezime}</span><span class="error_prezime"></span></td>

							</tr>

							<tr>

								<td><label for="email">Email: </label></td>

								<td><input type="text" name="email" id="email" {if isset($email)} value="{$email}"{/if} /><span class="error">{$greska.email}</span><span class="error_email"></span></td>

							</tr>

							<tr>

								<td><label for="username">Korisničko ime: </label></td>

								<td><input type="text" name="username" id="username" {if isset($username)} value="{$username}"{/if}/><span class="error">{$greska.username}</span><span class="error_username"></span></td>

							</tr>

							<tr>

								<td><label for="password">Lozinka: </label></td>

								<td><input type="password" name="password" id="password"/><span class="error">{$greska.password}</span><span class="error_password"></span></td>

							</tr>

							<tr>

								<td><label for="password_check">Potvrda lozinke: </label></td>

								<td><input type="password" name="password_check" id="password_check"/><span class="error"> {$greska.password_check}</span><span class="error_password_check"></span></td>

							</tr>

							<tr>
								<td><label for="file">Izaberite sliku:</label></td>
								<td><input type="file" name="upload_slike" id="file"><span class="error">{$greska.file_upload} {$greska.krivi_format} </span></td>
							</tr>

							<tr>
								<td></td>
								<td>{$captcha}</td>

							</tr>

							<tr>
								<td><input type="submit" name="submit" value="Registriraj me" id="submit_reg"/></td>

							</tr>

						</table>

					</form>

				</div>	

			</div>

{include file='footer.tpl'}