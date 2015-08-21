<?php /* Smarty version 2.6.6, created on 2012-05-01 22:41:20
         compiled from fijandrij_ispis.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4>Ispis korisnika</h4>
				</div>
				<div class = "podaci">
					<span class="error"><?php echo $this->_tpl_vars['error']; ?>
</span>	
					<p><?php echo $this->_tpl_vars['ispis']; ?>
<p>
					<table>
						<tr><td>
							<?php if ($this->_tpl_vars['stranica'] > 1): ?>
							<a href="fijandrij_ispis.php?page=<?php echo $this->_tpl_vars['stranica']-1; ?>
">&lt;</a>
							<?php else: ?> &lt;
							<?php endif; ?>
						</td><td>
							<?php if ($this->_tpl_vars['stranica'] < $this->_tpl_vars['broj_str']): ?>
						<a href="fijandrij_ispis.php?page=<?php echo $this->_tpl_vars['stranica']+1; ?>
">&gt;</a>
							<?php else: ?>&gt;
							<?php endif; ?>
						</td></tr>
					</table>	
				</div>	
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>