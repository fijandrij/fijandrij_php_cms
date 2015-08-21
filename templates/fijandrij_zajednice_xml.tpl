<?xml version="1.0" encoding="utf-8"?>
<zajednice>
		{section name=i loop=$red}
	        <zajednica
	        	value="{$zahtjev}"
	        	{if $tip eq 3}
	        		admin="1"
	        	{/if}
	            id="{$red[i].id}"
	            naziv="{$red[i].naziv}"
	            opis="{$red[i].opis}"
	            avgtroskovi="{$red[i].prosjek}"
	            {section name=j loop=$zaj}
	            	{if $red[i].id eq $zaj[j].zajednica_id}
	            		status="1"
	            		{if $zaj[j].aktivan eq 2}
	            			neaktivan="1"
	           			{/if}

	            		{if $zaj[j].tip_korisnika eq 2 or $tip eq 3}
	            		voditelj="1"
	           			{/if}
	           		{/if}
	            {/section}
	        />
	    {/section}
</zajednice>