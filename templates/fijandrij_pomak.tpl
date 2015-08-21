{include file='header.tpl'}
			<div id = "content">
				<div class="sadrzaj">
					<h4>Pomak vremena</h4>
				</div>
				<div class = "podaci">
					<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Pomak</a></br>
					<a id="vpostavi" href="fijandrij_pomak.php?uzmi=pomak">Postavi pomak</a>
					<span>{$return}</span><br/>	
					<div id="pomak_vrijeme"> 			
						<p>Stvarno vrijeme: {$time}</p>
						<p>Virtualno vrijeme: {$vrijeme}<p>
					</div>
				</div>	
				<div class="cru">
					<h4>CRU kontrola</h4>
					<form method="post" action="fijandrij_pomak.php">
							<select name="tb" >
									{section name=o loop=$opcije}
										<option value="{$opcije[o]}">{$opcije[o]}</option>
									{/section}
							</select>
							<input type="submit" name="ok" value="Kreni" />
						</select>
					</form>
				</div>
				<div id="cruds">
				</div>
			</div>
{include file='footer.tpl'}