<?php /* Smarty version 2.6.6, created on 2012-05-20 02:40:04
         compiled from fijandrij_pomak.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4>Pomak vremena</h4>
				</div>
				<div class = "podaci">
					<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Pomak</a></br>
					<a href="fijandrij_pomak.php?uzmi=pomak">Postavi pomak</a>
					<span><?php echo $this->_tpl_vars['return']; ?>
</span><br/>				
					<p>Stvarno vrijeme: <?php echo $this->_tpl_vars['time']; ?>
</p>
					<p>Virtualno vrijeme: <?php echo $this->_tpl_vars['vrijeme']; ?>
<p>
				</div>	
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>