{include file='header.tpl'}
			<div id = "content">
				<div class="sadrzaj">
					<h4>Ispis korisnika</h4>
				</div>
				<div class = "podaci">
					<span class="error">{$error}</span>	
					<p>{$ispis}<p>
					<table class="ispis">
						<tr><td>
							{if $stranica>1}
							<a href="fijandrij_ispis.php?page={$stranica-1}">&lt;</a>
							{else} &lt;
							{/if}
						</td><td>
							{if $stranica<$broj_str}
						<a href="fijandrij_ispis.php?page={$stranica+1}">&gt;</a>
							{else}&gt;
							{/if}
						</td></tr>
					</table>	
				</div>	
			</div>
{include file='footer.tpl'}