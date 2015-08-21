{include file='header.tpl'}
			<div id = "content">
				<div class="sadrzaj">
					<h4>Galerija slika</h4>
				</div>
				<div class = "podaci">
					{foreach from=$slike item=s}
						<a class="galerija" rel="g" href="{$s}"><img src="{$s}" alt="slika" /></a>
					{/foreach}	
				</div>	
			</div>
{include file='footer.tpl'}