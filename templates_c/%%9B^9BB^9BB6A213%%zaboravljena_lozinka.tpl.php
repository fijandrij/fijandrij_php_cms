<?php /* Smarty version 2.6.6, created on 2012-05-26 14:04:15
         compiled from zaboravljena_lozinka.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<div id = "content">

				<div class="sadrzaj">

					<h4>Zaboravljena lozinka</h4> 

				</div>

				<div class = "podaci">
					<form method="post" action="zaboravljena_lozinka.php" id="zaboravljena_lozinka">
						<span class="error"><?php echo $this->_tpl_vars['greska']['lozinka_ponovljena'];  echo $this->_tpl_vars['greska']['lozinka_nije_ponovljena']; ?>
</span>	

						<table class="forma">

								<td><label for="email">Email: </label></td>

								<td><input type="text" name="email" id="email" <?php if (isset ( $this->_tpl_vars['email'] )): ?> value="<?php echo $this->_tpl_vars['email']; ?>
"<?php endif; ?> /><span class="error"><?php echo $this->_tpl_vars['greska']['email_ponovljeni']; ?>
</span><span class="error_email"></span></td>

							</tr>

							<tr>

								<td><label for="username">Korisničko ime: </label></td>

								<td><input type="text" name="username" id="username" <?php if (isset ( $this->_tpl_vars['username'] )): ?> value="<?php echo $this->_tpl_vars['username']; ?>
"<?php endif; ?>/><span class="error"><?php echo $this->_tpl_vars['greska']['username_ponovljeni']; ?>
</span><span class="error_username"></span></td>

							</tr>

							<tr>
								<td><input type="submit" name="submit" value="Pošalji" id="pw_forget" /></td>

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