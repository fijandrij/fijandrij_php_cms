<?xml version="1.0" encoding="utf-8"?>
<troskovi>
		{section name=i loop=$red}
	        <trosak
	        	{if isset($clan) or $tip eq 3}
	        		clan="1"
	        	{/if}
	            nazivzajednice="{$red[i].naziv}"
	            idzajednice = "{$red[i].zajednica_id}"
	            idtroska="{$red[i].idtroskovi}"
	            datum="{$red[i].datum}"
	            cijena="{$red[i].cijena}"
	            opis="{$red[i].opis}"
	        />
	    {/section}
</troskovi>