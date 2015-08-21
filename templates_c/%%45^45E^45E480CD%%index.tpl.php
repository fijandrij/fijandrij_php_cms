<?php /* Smarty version 2.6.6, created on 2012-05-01 22:41:45
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('naslov' => $this->_tpl_vars['naslov'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div id = "content">
				<div class="sadrzaj">
					<h4>Osobni podaci</h4> 
				</div>
				<div class = "podaci">
					<table class="form">
					<tr>
						<td class="labels">Ime:</td>
						<td class="data">Filip</td>
					</tr>
					<tr>
						<td class="labels">Prezime:</td>
						<td class="data">Jandrijević</td>
					</tr>
					<tr>
						<td class="labels">Životopis:</td>
						<td class="data" id="zivotopis">
						<img src="images/moja_slika.jpg" alt="osobna slika autora" width="50"/>
						Završio sam osnovnu školu Braće Radića u Zagrebu te nakon završetka upisujem tehničku školu Ruđera Boškovića.
						Nakon završetka srednje škole u roku od 4 godine, 2009. upisujem Fakultet Organizacije i Informatike. Student
						sam treće godine i vjerujem da ću već ove godine završiti preddiplomski studij i upisati diplomksi studij. Svoje slobodno vrijeme provodim u teretani, također volim čitati knjige, gledati filmove te putovati. </td>
					</tr>
					<tr>
						<td class="labels">Datum i mjesto rođenja:</td>
						<td class="data">25.06.1990., Zagreb</td>
					</tr>
					<tr>
						<td class="labels">Grupa na vježbama:</td>
						<td class="data">G3</td>
					</tr>
					<tr>
						<td class="labels">Tema seminara:</td>
						<td class="data">PHP razvojni okviri za Web sustave</td>
					</tr>
				</table>
				</div>
				
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>