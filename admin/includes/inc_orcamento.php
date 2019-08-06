<link rel="stylesheet" href="css/style.css?version=555" media="screen,projection">

<div class="corpo">

	<nav class="navegacao">
		<div class="nav-wrapper">
			<ul class="right">
				<li>
					<input class="caixa cp" type="text" name="txtNomeCliente">
					<img class="caixaPesquisa" src="../img/lupa.png" width="30" height="auto" alt="Pesquisar" onclick="">
				</li>
				<li><a href="sass.html" class="waves-effect waves-light btn-small green">Novo</a></li>
			</ul>
		</div>
	</nav>

	<table class="table-pesquisa">
		<thead>
			<tr class="pesquisa-title">
				<th class="pesquisa-th">Data</th>
				<th class="pesquisa-th">Cliente</th>
				<th class="pesquisa-th">Vendedor</th>
				<th class="pesquisa-th">Entrega</th>
				<th class="pesquisa-th">Valor</th>
				<th class="pesquisa-th">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = "SELECT * FROM ORCAMENTOS ORDER BY CLIENTE ASC";

			// if ($_GET['list'] != "all") {
			// 	$q = $_GET['list'];
			// 	$query = "SELECT * FROM ORCAMENTOS WHERE CLIENTE LIKE '%".$q."%' OR DATA_NASCIMENTO LIKE '%".$q."%'";
			// }

			$tabela = mysqli_query($conn, $query);

			while ($tabelaDados = mysqli_fetch_array($tabela)) {
				echo "<tr class='zebrado'> ";
				$data = explode("-", $tabelaDados['DATA_CRIACAO']);

				$cliente = mysqli_query($conn, "SELECT CLIENTE FROM CLIENTES WHERE ID= " . $tabelaDados['CLIENTE'] . "");
				$cliente = mysqli_fetch_array($cliente);

				echo "<td class='pesquisa-td borda'>" . $dataNascimento[2] . "/" . $dataNascimento[1] . "/" . $dataNascimento[0] . "</td>";
				echo "<td class='pesquisa-td borda'>" . $cliente['CLIENTE'] . "</td>";
				echo "<td class='pesquisa-td borda'>" . $tabelaDados['TELEFONE_1'] . "</td>";
				echo "<td class='pesquisa-td borda'>" . $telefone2 . "</td>";
				echo "<td class='pesquisa-td borda'>" . $tabelaDados['TOTAL'] . "</td>";
				echo "<td class='pesquisa-td'> 
				<a href='' class='waves-effect waves-light btn-small green'>Detalhes</a> 
				<a href='' class='waves-effect waves-light btn-small red'>Apagar</a> 
				</td>";
				echo "</tr>";
			} ?>
		</tbody>
	</table>

</div>