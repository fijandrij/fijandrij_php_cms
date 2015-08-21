<?php /* Smarty version 2.6.6, created on 2012-05-28 21:26:47
         compiled from fijandrij_zajednice.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4><?php echo $this->_tpl_vars['naslov']; ?>
</h4> 
				</div>
				<div id="zajednice">
					<input type="hidden" id="zahtjev" name="foo" value="<?php echo $this->_tpl_vars['zahtjev']; ?>
" />
				</div>
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>