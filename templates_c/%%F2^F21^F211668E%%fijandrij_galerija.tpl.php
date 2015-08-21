<?php /* Smarty version 2.6.6, created on 2012-05-15 20:31:41
         compiled from fijandrij_galerija.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4>Galerija slika</h4>
				</div>
				<div class = "podaci">
					<?php if (count($_from = (array)$this->_tpl_vars['slike'])):
    foreach ($_from as $this->_tpl_vars['s']):
?>
						<a class="galerija" rel="g" href="<?php echo $this->_tpl_vars['s']; ?>
"><img src="<?php echo $this->_tpl_vars['s']; ?>
" alt="slika" /></a>
					<?php endforeach; unset($_from); endif; ?>	
				</div>	
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>