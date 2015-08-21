{include file='header.tpl'}
			{if isset($clan) or $tip eq 3}
				<div id="menu">
					<span><a href="fijandrij_troskovi.php?trosak={$trosak}&kreiraj=1">+ Kreiraj trošak</a></span>
				</div>
			{/if}
			<div id = "content">
				<div class="sadrzaj">
					<h4>{$naslov}</h4> 
				</div>
				<div id="troskovi">
					<input type="hidden" id="foo" name="foo" value="{$trosak}" />
				</div>	
				<br><br>
				{if isset($kreiraj)}
					<form action="fijandrij_troskovi.php?trosak={$trosak}" method="POST">
						<table>
							<tr><td>Tip troška (*postojeći)</td><td>
								<select name="trosak">
									{section name=i loop=$red_troska}
									<option value="{$red_troska[i].naziv}">{$red_troska[i].naziv}</option>
									{/section}
								</select>
							</td></tr>
							<tr><td>Tip troška (*novi)</td><td><input type="text" name="tip_troska" /></td></tr>
							<tr><td>Iznos troška:</td><td><input type="text" name="cijena_troska" /></td></tr>
							<tr><td>Datum:</td><td><input type="text" id="datepicker" name="datum" /></td></tr>
							<tr><td>Opis troška:</td><td><input type="text" name="opis_troska" /></td></tr>
							<tr><td></td><td><input type="submit" name="submit" value="kreiraj!" /></td></tr>
						</table>	
					</form>
				{/if}
			</div>
{include file='footer.tpl'}