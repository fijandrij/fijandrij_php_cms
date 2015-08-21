<?php /* Smarty version 2.6.6, created on 2012-05-27 21:24:27
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>

		<title><?php echo $this->_tpl_vars['naslov']; ?>
</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

		<link rel="stylesheet" type="text/css" href="stylesheet/fijandrij_novo.css"/>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
		<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css"/>
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

		<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="js/fancybox/jquery.easing-1.3.pack.js"></script>
		<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

		<script type="text/javascript" src="js/fijandrij_table_pagination/jquery.tablePagination.0.5.js"></script>

		<script type="text/javascript" src="js/fijandrij.js"></script>

	</head>

	<body>

		<div id = "container">

			<div id = "header">
				Filip Jandrijević
				<?php if (isset ( $this->_tpl_vars['korisnik'] )): ?>
					<div id="user_area">
						<table>
							<tr><td><img src="<?php echo $this->_tpl_vars['slika']; ?>
" width="40" height="30" /></td><td><h4>Dobrodošao, <?php echo $this->_tpl_vars['korisnik']; ?>
</h4></td></tr>
							<tr>
								<td>
									<img src="images/folder.gif" /></td>
								<td>
									<a href="uredi_profil.php?user=<?php echo $this->_tpl_vars['korisnik']; ?>
">Uredi profil</td></tr>
							<tr>
								<td>
									</td>
								<td>
									<a href="logout.php">logout</a>
								</td>
							</tr>
						</table>
					</div>
				
			</div>

			<div id = "top_menu">

				<ul>

					<li><a href="index.php">[x]Osobni podaci</a></li>
					<li><a href="fijandrij_ispis.php">[x]Ispis korisnika</a></li>
					<?php if ($this->_tpl_vars['tip'] == 3): ?><li><a href="fijandrij_pomak.php">[x]Upravljanje vremenom</a></li><?php endif; ?>
					<li><a href="fijandrij_zajednice.php">[x]Zajednice</a></li>
					<li><a href="fijandrij_galerija.php">[x]Galerija</a></li>
					<li><a href="fijandrij_dokumentacija.php">[x]Dokumentacija</a></li>

				</ul>
				<?php else: ?>
					</div>

			<div id = "top_menu">

				<ul>

					<li><a href="index.php">[x]Osobni podaci</a></li>
					<li><a href="fijandrij_registracija.php">[x]Registracija</a></li>
					<li><a href="fijandrij_prijava.php">[x]Prijava</a></li>
					<li><a href="fijandrij_zajednice.php">[x]Zajednice</a></li>
					<li><a href="fijandrij_dokumentacija.php">[x]Dokumentacija</a></li>

				</ul>
					
				<?php endif; ?>
			</div>
			<div id="menu">
			</div>
			