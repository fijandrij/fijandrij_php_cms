{include file='header.tpl'}
			{if isset($korisnik)}
				<div id="menu">
					<span><a href="fijandrij_zajednice.php?kreiraj=1">+ Kreiraj zajednicu</a></span>
				</div>
			{/if}
			<div id = "content">
				<div class="sadrzaj">
					<h4>{$naslov}</h4> 
				</div>
				<div id="zajednice">

					<input type="hidden" id="zahtjev" name="foo" value="{$zahtjev}" />
				</div>
				<br><br>
				{if isset($kreiraj)}
					<form action="fijandrij_zajednice.php" method="POST">
						<table>
							<tr><td>Naziv zajednice</td><td><input type="text" name="zajednica" /></td></tr>
							<tr><td>Opis zajednice</td><td><input type="text" name="opis" /></td></tr>
							<tr><td></td><td><input type="submit" name="submit" value="kreiraj!" /></td></tr>
						</table>	
					</form>
				{/if}
				
			</div>
{include file='footer.tpl'}