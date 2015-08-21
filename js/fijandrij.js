$(document).ready(function() {	
	$("a.galerija").fancybox();
	

	var username = $("#username");
	var password = $("#password");
	var error_username = $(".username_greska");
	var error_lozinka = $(".lozinka_greska");
	var error = $(".error");
	var forma = $("#prijava");

	//registracija

	var ime = $("#ime");
	var prezime = $("#prezime");
	var email = $("#email");
	var kor_ime = $("#username");
	var lozinka = $("#password");
	var lozinka_p = $("#password_check");
	var forma_reg = $('#registracija');

	var error_reg = false;

	//fokus na oznaceni element

	$('input').focus(function(){
		$(this).css('background', '#404040');
	});

	$('input').blur(function(){
		$(this).css('background', '');
	});

	$('table tbody tr').mouseover(function () {
		$(this).addClass('selectedRow');
	});

	$('table tbody tr').mouseout(function () {
		$(this).removeClass('selectedRow');
	});

	//

	$('table tbody tr#zajednice').mouseover(function () {
		$(this).addClass('selectedRow');
	});

	$('table tbody tr#zajednice').mouseout(function () {
		$(this).removeClass('selectedRow');
	});

	//

	//datepicker

	$('#datepicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});

	//

	$('#submit').click(function(){
		
		var error = false;
		
		if(username.val().length < 1){
			error_username.text("Unesite korisnika");
			error_username.css("color", "red");
			error = true;
		}
		else{
			error_username.text("");
		}
	
		if(password.val().length < 1){
			error_lozinka.text("Unesite lozinku");
			error_lozinka.css("color", "red");
			error = true;
		}
		else{
			error_lozinka.text("");
		}
		
		if(error == true){
			return false;
		}
		else{
			return true;
		}

	});

	$('#username').keyup(ajax);

	function ajax(){
		$.ajax({
					url:'korisnik.php?username='+ kor_ime.val(),
					type:'GET',
					dataType: 'xml',
					success: function(xml) { 
								if($(xml).find('broj').text() == 1){
									$('.error_username').text("");
									error_reg = false;
									
								}
								else{
									$('.error_username').text("Korisnik postoji u bazi");
									$('.error_username').css("color", "red");
									error_reg = true;		
								}				
						}
					});
	}

	//registracija on click eventi

	$('#submit_reg').click(function(){

			var error_reg = false;
		
			var regexp_prvo = /^[A-ZČĆĐŠŽ]/;
			var regexp_sve = /^[A-zčćđšž ]*$/;

			if(ime.val().length < 1){
				$('.error_ime').text("Unesite ime");
				$('.error_ime').css("color", "red");
				error_reg = true;
			}
			else if(!regexp_prvo.test(ime.val()) || !regexp_sve.test(ime.val())){
				$('.error_ime').text("Ime mora započet velikim slovom i mora se sastojat samo od slova");
				$('.error_ime').css("color", "red");
				error_reg = true;
			}
			else{
				$('.error_ime').text("");
				
			}
		

			var regexp_prvo_prez = /^[A-ZČĆĐŠŽ]/;
			var regexp_sve_prez = /^[A-zčćđšž ]*$/;
			if(prezime.val().length < 1){
				$('.error_prezime').text("Unesite prezime");
				$('.error_prezime').css("color", "red");
				error_reg = true;
			}
			else if(!regexp_prvo_prez.test(prezime.val()) || !regexp_sve_prez.test(prezime.val())){
				$('.error_prezime').text("Prezime mora započet velikim slovom i mora se sastojat samo od slova");
				$('.error_prezime').css("color", "red");
				error_reg = true;	
			}
			else{
				$('.error_prezime').text("");
				
			}
		


			var regexp = /^((?:(?:(?:[a-zA-Z0-9][\.\-\+_]?)*)[a-zA-Z0-9])+)\@((?:(?:(?:[a-zA-Z0-9][\.\-_]?){0,62})[a-zA-Z0-9])+)\.([a-zA-Z0-9]{2,6})$/;
			var eval = email.val();

			if(email.val().length < 1){
				$('.error_email').text("Unesite email");
				$('.error_email').css("color", "red");
				error_reg = true;
			}
			else if(!regexp.test(eval)){
				$('.error_email').text("Unesite ispravnu email adresu");
				$('.error_email').css("color", "red");
				error_reg = true;
			}
			else{
				$('.error_email').text("");
			}
		
		
			if(kor_ime.val().length < 1){
				$('.error_username').text("Unesite korisničko ime");
				$('.error_username').css("color", "red");
				error_reg = true;
			}
		
			regexp_pw = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#!\|"&'*.$%]).{6,})/;
			if(lozinka.val().length < 1){
				$('.error_password').text("Unesite lozinku");
				$('.error_password').css("color", "red");
				error_reg = true;
			}
			else if(!regexp_pw.test(lozinka.val())){
				$('.error_password').text("lozinka mora imati najmanje 6 znakova te mora sadržavati velika i mala slova, brojeve te posebne znakove (#, !, . i sl.)");
				$('.error_password').css("color", "red");
				error_reg = true;
			}
			else{
				$('.error_password').text("");
				
			}
		

	
			if(lozinka_p.val().length < 1){
				$('.error_password_check').text("Unesite ponovljenu lozinku");
				$('.error_password_check').css("color", "red");
				error_reg = true;
			}
			else{
				$('.error_password_check').text("");
				
			}
	

		
			if(lozinka.val() != lozinka_p.val()){
				$('.error_password_check').text("Ponovljena lozinka je neispravna");
				$('.error_password_check').css("color", "red");
				error_reg = true;
			}
			
			if(error_reg == true){
				return false;
			}
			else{
				return true;
			}
		

	});

	$('#pw_forget').click(function(){
			var error_ponovo_sifra = false;

			var regexp = /^((?:(?:(?:[a-zA-Z0-9][\.\-\+_]?)*)[a-zA-Z0-9])+)\@((?:(?:(?:[a-zA-Z0-9][\.\-_]?){0,62})[a-zA-Z0-9])+)\.([a-zA-Z0-9]{2,6})$/;
			var eval = email.val();

			if(email.val().length < 1){
				$('.error_email').text("Unesite email");
				$('.error_email').css("color", "red");
				error_ponovo_sifra = true;
			}
			else if(!regexp.test(eval)){
				$('.error_email').text("Unesite ispravnu email adresu");
				$('.error_email').css("color", "red");
				error_ponovo_sifra = true;
			}
			else{
				$('.error_email').text("");
			}
		
		
			if(kor_ime.val().length < 1){
				$('.error_username').text("Unesite korisničko ime");
				$('.error_username').css("color", "red");
				error_ponovo_sifra = true;
			}

			if(error_ponovo_sifra == true){
				return false;
			}
			else{
				return true;
			}


	});

	//ispis zajednica preko ajaxa

	$("a.zahtj").live("click", function(event){
		event.preventDefault();
		var id = $(this).attr("href");
		$("#zajednice").empty();

		$.ajax({
				url: 'fijandrij_zajednice_xml.php?' + id,
				type: 'GET',
				datatype: 'xml',
				success: function(xml) {
					var table = $('<table id="tblzajednice">');
					table.append('<tr id="zajednice"><th>Članstvo</th><th>Naziv</th><th>Opis</th><th>Prosjek troškova</th></tr>');
					$(xml).find('zajednica').each(function(){
						if($(this).attr('value') == 1){
							if($(this).attr('status') == 1 || $(this).attr('admin') == 1){
								if($(this).attr('voditelj') == 1 || $(this).attr('admin') == 1){
									table.append('<tr><td><img src="images/accept.png" alt="accept" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td></td><td><a class="voditelj_zajednice" href="voditelj_administracija.php?tr='+ $(this).attr('id') +'"><img src="images/configure.png" /></a></td><td><a class="voditelj_zajednice" href="voditelj_administracija.php?tr='+ $(this).attr('id') +'&remove=1"><img src="images/cancel.png" alt="voditelj" /></a></td></tr>');	
								}else{
									if($(this).attr('neaktivan') == 1){
										table.append('<tr><td><img src="images/cekanje.png" alt="u toku" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '&n=1"></a></td></tr>');
	
									}else{
										table.append('<tr><td><img src="images/accept.png" alt="accept" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '&n=1"><img src="images/napusti.png" alt="napusti" />"</a></td></tr>');
	
									}
								}
							}else{
								//ovdje ispitujem da li je poslan zahtjev za prijavu ili nije
								table.append('<tr><td></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '"><img src="images/zahtjev.png" /></a></td></tr>');
							}
					
						}else{
							table.append('<tr><td></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td></tr>');
						}
					});
					$("#zajednice").append(table); 
					$("#zajednice").show('fold', 500);

					table.tablePagination({
						firstArrow: (new Image()).src="js/fijandrij_table_pagination/first.png",
						prevArrow: (new Image()).src="js/fijandrij_table_pagination/previous.png",
						lastArrow: (new Image()).src="js/fijandrij_table_pagination/last.png",
						nextArrow: (new Image()).src="js/fijandrij_table_pagination/next.png",
						ignoreRows: $("tr#zajednice"),
						optionsForRows: [5,10,25]
					});

				}
			});


	});


	//

	$.ajax({
				url: 'fijandrij_zajednice_xml.php',
				datatype: 'xml',
				success: function(xml) {
					var table = $('<table id="tblzajednice">');
					table.append('<tr id="zajednice"><th>Članstvo</th><th>Naziv</th><th>Opis</th><th>Prosjek troškova</th></tr>');
					$(xml).find('zajednica').each(function(){
						if($(this).attr('value') == 1){
							if($(this).attr('status') == 1 || $(this).attr('admin') == 1){
								if($(this).attr('voditelj') == 1 || $(this).attr('admin') == 1){
									table.append('<tr><td><img src="images/accept.png" alt="accept" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td></td><td><a class="voditelj_zajednice" href="voditelj_administracija.php?tr='+ $(this).attr('id') +'"><img src="images/configure.png" alt="voditelj" /></a></td><td><a class="voditelj_zajednice" href="voditelj_administracija.php?tr='+ $(this).attr('id') +'&remove=1"><img src="images/cancel.png" alt="voditelj" /></a></td></tr>');	
								}else{
									if($(this).attr('neaktivan') == 1){
										table.append('<tr><td><img src="images/cekanje.png" alt="u toku" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '&n=1"></a></td></tr>');
	
									}else{
										table.append('<tr><td><img src="images/accept.png" alt="accept" /></td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '&n=1"><img src="images/napusti.png" alt="napusti" />"</a></td></tr>');
	
									}
								}
							}else{
								table.append('<tr><td> </td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td><td><a class="zahtj" href="id=' + $(this).attr('id') + '"><img src="images/zahtjev.png" alt="zahtjev" /></a></td></tr>');
							}
					
						}else{
							table.append('<tr><td> </td><td><a href="fijandrij_troskovi.php?trosak=' + $(this).attr('id') + '">' + $(this).attr('naziv') + '</a></td><td>' + $(this).attr('opis') + '</td><td>' + $(this).attr('avgtroskovi') + '</td></tr>');
						}
					});
					$("#zajednice").append(table); 
					$("#zajednice").show('fold', 500);

					table.tablePagination({
						firstArrow: (new Image()).src="js/fijandrij_table_pagination/first.png",
						prevArrow: (new Image()).src="js/fijandrij_table_pagination/previous.png",
						lastArrow: (new Image()).src="js/fijandrij_table_pagination/last.png",
						nextArrow: (new Image()).src="js/fijandrij_table_pagination/next.png",
						ignoreRows: $("tr#zajednice"),
						optionsForRows: [5,10,25]
					});

				}
			});

	//ispis troskova preko ajaxa

	
/*
	$('a#komentari').live('click',function(event){
		event.preventDefault();
		var url = $(this).attr("href");

		$('#troskovi').empty();

		$.ajax({
				url: 'fijandrij_troskovi_xml.php?' + url,
				type: 'GET',
				datatype: 'xml',
				success: function(xml) {
					var table = $('<table class="form" id="users" border="1">');
					
	
					$(xml).find('trosak').each(function(){
							table.append('<tr id="troskovi1"><th>Naziv zajednice</th><td>' + $(this).attr('nazivzajednice') + '</td></tr><tr><th>Datum</th><td>' + $(this).attr('datum') + '</td></tr><tr><th>cijena</th><td>' + $(this).attr('cijena') + '</td></tr><tr><th>opis</th><td>' + $(this).attr('opis')  + '</td></tr><tr><td><div id="example-2"></div> <br />Your Rating: <span id="example-rating-2">not set</span></td></tr>');

				
					});

					$("#troskovi").append(table); 
					$("#troskovi").show('fold', 500);

				}
			});

	});*/
	


	var br;
	$.ajax({
				url: 'fijandrij_troskovi_xml.php',
				type: 'GET',
				data: {trosak: $('#foo').val()},
				datatype: 'xml',
				success: function(xml) {
					var table = $('<table id="tblzajednice">');
	
					$(xml).find('trosak').each(function(){
						if($(this).attr('clan') == 1){
							table.append('<tr id="troskovi1"><th>Naziv zajednice</th><td>' + $(this).attr('nazivzajednice') + '</td></tr><tr><th>Datum</th><td>' + $(this).attr('datum') + '</td></tr><tr><th>cijena</th><td>' + $(this).attr('cijena') + '</td></tr><tr><th>opis</th><td>' + $(this).attr('opis')  + '</td></tr><tr><th><a id="komentari" href="troskovi_komentari.php?trosak=' + $('#foo').val() +'&idtr=' + $(this).attr('idtroska') + '" >Komentiraj i ocjeni</a></th></tr></tr>');
							br = 5;	
						}else{
							table.append('<tr id="troskovi1"><th>Naziv zajednice</th><td>' + $(this).attr('nazivzajednice') + '</td></tr><tr><th>Datum</th><td>' + $(this).attr('datum') + '</td></tr><tr><th>cijena</th><td>' + $(this).attr('cijena') + '</td></tr><tr><th>opis</th><td>' + $(this).attr('opis')  + '</td></tr>');
							br = 4;
						}
				
					});
					$("#troskovi").append(table); 
					$("#troskovi").show('fold', 500);

					table.tablePagination({
						firstArrow: (new Image()).src="js/fijandrij_table_pagination/first.png",
						prevArrow: (new Image()).src="js/fijandrij_table_pagination/previous.png",
						lastArrow: (new Image()).src="js/fijandrij_table_pagination/last.png",
						nextArrow: (new Image()).src="js/fijandrij_table_pagination/next.png",
						//ignoreRows: $("tr#troskovi"),
						rowsPerPage : br,
						optionsForRows: [4]
					});

				}
			});

		
		$('a.prihvati').live("click", function(event){
			event.preventDefault();
			var id = $(this).attr("href");
			$('#voditelj_podaci').empty();
			$.ajax({
				url: 'voditelj_administracija_xml.php?' + id,
				type: 'GET',
				datatype: 'xml',
				success: function(xml) {

					var table = $('<table id="tblzajednice">');
					table.append('<tr id="voditelj_podaci1"><th>Ime</th><th>Prezime</th><th>Korisničko ime</th></tr>');
					$(xml).find('voditelja').each(function(){
							table.append('<tr><td>' + $(this).attr('ime') + '</td><td>' + $(this).attr('prezime') + '</td><td>' + $(this).attr('username') + '</td><td><a class="prihvati" href="id=' + $(this).attr('userid') + '&zajid=' +  $(this).attr('zajedid') + '&status=1"><img src="images/accept.png" alt="prihvati" /></a></td><td><a class="prihvati" href="id=' + $(this).attr('userid') + '&zajid=' +  $(this).attr('zajedid') + '&status=2"><img src="images/cancel.png" alt="odbij" /></a></td></tr>');	

					});

					$("#voditelj_podaci").append(table); 
					$("#voditelj_podaci").show('fold', 500);

					/*table.tablePagination({
						firstArrow: (new Image()).src="js/fijandrij_table_pagination/first.png",
						prevArrow: (new Image()).src="js/fijandrij_table_pagination/previous.png",
						lastArrow: (new Image()).src="js/fijandrij_table_pagination/last.png",
						nextArrow: (new Image()).src="js/fijandrij_table_pagination/next.png",
						//ignoreRows: $("tr#troskovi"),
						rowsPerPage : 4,
						optionsForRows: [4]
					});*/

				}
			});	
		});


		$.ajax({
				url: 'voditelj_administracija_xml.php',
				type: 'GET',
				data: {zajednica_id: $('#zajed_id').val()},
				datatype: 'xml',
				success: function(xml) {

					var table = $('<table id="tblzajednice">');
					table.append('<tr id="voditelj_podaci1"><th>Ime</th><th>Prezime</th><th>Korisničko ime</th></tr>');
					$(xml).find('voditelja').each(function(){
							table.append('<tr><td>' + $(this).attr('ime') + '</td><td>' + $(this).attr('prezime') + '</td><td>' + $(this).attr('username') + '</td><td><a class="prihvati" href="id=' + $(this).attr('userid') + '&zajid=' +  $(this).attr('zajedid') + '&status=1"><img src="images/accept.png" alt="prihvati" /></a></td><td><a class="prihvati" href="id=' + $(this).attr('userid') + '&zajid=' +  $(this).attr('zajedid') + '&status=2"><img src="images/cancel.png" alt="odbij" /></a></td></tr>');	

					});

					$("#voditelj_podaci").append(table); 
					$("#voditelj_podaci").show('fold', 500);

					/*table.tablePagination({
						firstArrow: (new Image()).src="js/fijandrij_table_pagination/first.png",
						prevArrow: (new Image()).src="js/fijandrij_table_pagination/previous.png",
						lastArrow: (new Image()).src="js/fijandrij_table_pagination/last.png",
						nextArrow: (new Image()).src="js/fijandrij_table_pagination/next.png",
						//ignoreRows: $("tr#troskovi"),
						rowsPerPage : 4,
						optionsForRows: [4]
					});*/

				}
			});


	$('#example-2').ratings(5).bind('ratingchanged', function(event, data) {
		$('#example-rating-2').text(data.rating);

 	 });
	

	$('.jquery-ratings-full').live('click', function(){
		var ocjena = $('#example-rating-2').text();
		var kor_id = $('#kid').val();
		var tr_id = $('#tid').val();

		var id = 'ocjena=' + ocjena + '&kor_id=' + kor_id + '&tr_id=' + tr_id;

		$.ajax({
					url:'troskovi_ocjena.php?' + id,
					type:'GET',
					dataType: 'xml',
					success: function(xml) { 
												
						}
					});
	});
	
	$('a#vpostavi').click(function(event){
		event.preventDefault();
		$.ajax({
					url:'fijandrij_pomak.php?uzmi=pomak',
					type:'GET',
					success: function() { 
						$.ajax({
							url:'virtualno_vrijeme/fijandrij_pomak.xml',
							datatype: 'XML',
							success: function(xml) {
								$(xml).find('pomak').each(function() {
									var pom = $(this).attr("brojSati");
									$("#pomak_vrijeme").empty();
									$("#pomak_vrijeme").append('<p>Trenutni pomak: ' + pom + ' sati</p>');
								});
							}
						});		
					}
		});	
	});

	$("input.btn").parent().appendTo("div#cruds");
	$('form[id^="add_form"]').appendTo("div#cruds");
	$('form[id^="add_form"]').css("width","50%");
	$('form[id^="add_form"]').css("margin","auto");
	$("table.ajaxCRUD").parent().appendTo("div#cruds");
});