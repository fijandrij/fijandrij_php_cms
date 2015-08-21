<?php /* Smarty version 2.6.6, created on 2012-05-25 23:03:25
         compiled from fijandrij_prijava.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4>Prijava korisnika</h4> 
				</div>
				<div>
					<form method="post" action="fijandrij_prijava.php" id="prijava">	
						<table class="forma">
							<tr>
								<span class="error"><?php echo $this->_tpl_vars['greska']['prijava_pogresna']; ?>
 <?php echo $this->_tpl_vars['greska']['status_pogresan']; ?>
 <?php echo $this->_tpl_vars['greska']['blokada']; ?>
 <?php echo $this->_tpl_vars['poruka']; ?>
 <?php echo $this->_tpl_vars['blokiran']; ?>
 <?php echo $this->_tpl_vars['greska']['neprijavljen']; ?>
<span>
								
							</tr>
							<tr>
								<td><label for="username">Korisničko ime: </label></td>
								<td><input type="text" name="username" id="username" <?php if (isset ( $this->_tpl_vars['ime_korisnika'] )): ?> value="<?php echo $this->_tpl_vars['ime_korisnika']; ?>
" <?php endif; ?>/><span class="username_greska"></span></td>
							</tr>
							<tr>
								<td><label for="password">Lozinka: </label></td>
								<td><input type="password" name="password" id="password"/><span class="lozinka_greska"></span></td>
							</tr>
							<tr>
								<td><label>Zapamti me: </label></td>
								<td><input type="checkbox" name="checkbox" value="1" id="terms" /></td>
							</tr>
										
							<tr>
								<td><input type="submit" name="submit" class="submit" value="Prijava" id="submit"/></td>
								<td><label><a href="zaboravljena_lozinka.php">Zaboravili ste lozinku?</a></label></td>
							</tr>
						</table>
					</form>
				</div>	
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>