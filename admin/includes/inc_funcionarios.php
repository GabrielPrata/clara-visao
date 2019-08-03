<link rel="stylesheet" href="css/style.css?version=5151" media="screen,projection">

<div class="corpo">

	<nav class="navegacao">
		<div class="nav-wrapper">
			<ul class="right">
				<li><a href="sass.html" class="waves-effect waves-light btn-small green">Novo</a></li>
			</ul>
		</div>
	</nav>

	<table>
		<thead>
			<tr class="pesquisa-title">
				<th class="pesquisa-th">Vendedor</th>
				<th class="pesquisa-th">Código</th>
				<th class="pesquisa-th">Telefone</th>
				<th class="pesquisa-th">Total de Vendas</th>
				<th class="pesquisa-th">Vendas Mensais</th>
				<th class="pesquisa-th">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$tabela = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS");
			while ($tabelaDados = mysqli_fetch_array($tabela)) {
				echo "<tr class='zebrado'> ";
				echo "<td class='pesquisa-td borda'>" . $tabelaDados['NOME'] . "</td>";
				echo "<td class='pesquisa-td borda'>" . $tabelaDados['CODIGO'] . "</td>";
				echo "<td class='pesquisa-td borda'>" . $tabelaDados['TELEFONE'] . "</td>";
				echo "<td class='pesquisa-td borda'> 54 </td>";
				echo "<td class='pesquisa-td borda'> 10 </td>";
				echo "<td class='pesquisa-td'> 
				<a href='' class='waves-effect waves-light btn-small green'>Detalhes</a> 
				<a href='' class='waves-effect waves-light btn-small red'>Apagar</a> 
				</td>";
				echo "</tr>";
			} ?>
		</tbody>
	</table>

</div>