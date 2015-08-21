<?php /* Smarty version 2.6.6, created on 2012-05-25 13:27:34
         compiled from fijandrij_registracija.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<div id = "content">

				<div class="sadrzaj">

					<h4>Registracija korisnika</h4> 

				</div>

				<div class = "podaci">

					<form method="post" action="obrada.php" enctype="multipart/form-data" id="registracija">	

						<table class="forma">

							<tr>
								<span class="error"><?php echo $this->_tpl_vars['greska']['postoji_user']; ?>
</span><br>
								<span class="error"><?php echo $this->_tpl_vars['greska']['kriva_lozinka']; ?>
</span><br>
								<span class="error"><?php echo $this->_tpl_vars['greska']['razlicita_lozinka']; ?>
</span>
								<span class="error"><?php echo $this->_tpl_vars['greska']['captcha']; ?>
</span>
								
								<td><label for="ime">Ime: </label></td>

								<td><input type="text" name="ime" id="ime" <?php if (isset ( $this->_tpl_vars['ime'] )): ?> value="<?php echo $this->_tpl_vars['ime']; ?>
"<?php endif; ?> /><span class="error"><?php echo $this->_tpl_vars['greska']['ime']; ?>
</span><span class="error_ime"></span></td>

							</tr>

							<tr>

								<td><label for="prezime">Prezime: </label></td>

								<td><input type="text" name="prezime" id="prezime" <?php if (isset ( $this->_tpl_vars['prezime'] )): ?> value="<?php echo $this->_tpl_vars['prezime']; ?>
"<?php endif; ?>/><span class="error"><?php echo $this->_tpl_vars['greska']['prezime']; ?>
</span><span class="error_prezime"></span></td>

							</tr>

							<tr>

								<td><label for="email">Email: </label></td>

								<td><input type="text" name="email" id="email" <?php if (isset ( $this->_tpl_vars['email'] )): ?> value="<?php echo $this->_tpl_vars['email']; ?>
"<?php endif; ?> /><span class="error"><?php echo $this->_tpl_vars['greska']['email']; ?>
</span><span class="error_email"></span></td>

							</tr>

							<tr>

								<td><label for="username">Korisničko ime: </label></td>

								<td><input type="text" name="username" id="username" <?php if (isset ( $this->_tpl_vars['username'] )): ?> value="<?php echo $this->_tpl_vars['username']; ?>
"<?php endif; ?>/><span class="error"><?php echo $this->_tpl_vars['greska']['username']; ?>
</span><span class="error_username"></span></td>

							</tr>

							<tr>

								<td><label for="password">Lozinka: </label></td>

								<td><input type="password" name="password" id="password"/><span class="error"><?php echo $this->_tpl_vars['greska']['password']; ?>
</span><span class="error_password"></span></td>

							</tr>

							<tr>

								<td><label for="password_check">Potvrda lozinke: </label></td>

								<td><input type="password" name="password_check" id="password_check"/><span class="error"> <?php echo $this->_tpl_vars['greska']['password_check']; ?>
</span><span class="error_password_check"></span></td>

							</tr>

							<tr>
								<td><label for="file">Izaberite sliku:</label></td>
								<td><input type="file" name="upload_slike" id="file"><span class="error"><?php echo $this->_tpl_vars['greska']['file_upload']; ?>
 <?php echo $this->_tpl_vars['greska']['krivi_format']; ?>
 </span></td>
							</tr>

							<tr>
								<td></td>
								<td><?php echo $this->_tpl_vars['captcha']; ?>
</td>

							</tr>

							<tr>
								<td><input type="submit" name="submit" value="Registriraj me" id="submit_reg"/></td>

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