<?xml version="1.0" encoding="utf-8"?>
<voditelji>
		{section name=i loop=$temp}
	        <voditelja
	        	zajedid="{$zajednica_id}"
	        	userid="{$temp[i].user_id}"
	        	ime="{$temp[i].ime}"
	        	prezime="{$temp[i].prezime}"
	        	username="{$temp[i].korisnicko_ime}"	            
	        />
	    {/section}
</voditelji>