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
				<div id="troskovi_komentari">
					<table id="troskovi_komentar">
						<tr><th>Naziv zajednice</th><td>{$row.naziv}</td></tr>
						<tr><th>Datum</th><td>{$row.datum}</td></tr>
						<tr><th>cijena</th><td>{$row.cijena}</td></tr>
						<tr><th>opis</th><td>{$row.opis}</td></tr>
						<tr><td><div id="example-2"></div></td><td> <span id="example-rating-2">{$ocjena}</span></td>
					</table>

					<div id="kom">
						<table id="komm">
							<tr><th>Pošiljatelj</th><th>Komentar</th></tr>
						{section name=i loop=$kom}
							<tr><td>{$kom[i].korisnicko_ime}</td><td>{$kom[i].komentar}</td></tr><br/>
						{/section}
						</table>	
					</div>
					<br/>
					<form action="troskovi_komentari.php?trosak={$trosak}&idtr={$idtr}" method="POST">
						<textarea name="komentar" cols="40" rows="6"></textarea><br/>
						<input type="submit" name="submit" value="komentiraj" />
					</form>
					<input type="hidden" id="tid" value="{$idtr}" />
					<input type="hidden" id="kid" value="{$kid}" />
				</div>	
				
			</div>
{include file='footer.tpl'}