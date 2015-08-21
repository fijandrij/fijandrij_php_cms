{include file='header.tpl'}
				<div id="menu">
					
				</div>
			<div id = "content">
				<div class="sadrzaj">
					<h4>{$naslov}</h4> 
				</div>
				<div id="kosarica">
	
						<table id = "tblzajednice">
							<tr><th>Tip troška</th><th>Objavi trošak</th><th>Ukloni trošak</th></tr>
						{section name=i loop=$row}
							<tr><td>{$row[i].naziv}</td><td><a href="kosarica.php?id={$row[i].idtroskovi}"><img src="images/accept.png" alt="potvrdi" /></a></td><td><a href="kosarica.php?id={$row[i].idtroskovi}&brisi=1"><img src="images/cancel.png" alt="potvrdi" /></a></td></tr><br/>
						{/section}
						</table>	
	
				</div>	
				
			</div>
{include file='footer.tpl'}