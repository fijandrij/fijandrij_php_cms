{include file='header.tpl'}

			<div id = "content">

				<div class="sadrzaj">

					<h4>Zaboravljena lozinka</h4> 

				</div>

				<div class = "podaci">
					<form method="post" action="zaboravljena_lozinka.php" id="zaboravljena_lozinka">
						<span class="error">{$greska.lozinka_ponovljena}{$greska.lozinka_nije_ponovljena}</span>	

						<table class="forma">

								<td><label for="email">Email: </label></td>

								<td><input type="text" name="email" id="email" {if isset($email)} value="{$email}"{/if} /><span class="error">{$greska.email_ponovljeni}</span><span class="error_email"></span></td>

							</tr>

							<tr>

								<td><label for="username">Korisničko ime: </label></td>

								<td><input type="text" name="username" id="username" {if isset($username)} value="{$username}"{/if}/><span class="error">{$greska.username_ponovljeni}</span><span class="error_username"></span></td>

							</tr>

							<tr>
								<td><input type="submit" name="submit" value="Pošalji" id="pw_forget" /></td>

							</tr>

						</table>

					</form>

				</div>	

			</div>

{include file='footer.tpl'}