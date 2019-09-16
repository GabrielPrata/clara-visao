<link rel="stylesheet" href="../css/orcamentos.css" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
        <h4 class="titulo-form">Orçamentos</h4>
        <?php
            include '../src/conn.php';

            $sql = "SELECT * FROM ORCAMENTOS ORDER BY CLIENTE DESC LIMIT 25";

            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);

            if ($count == 0) {
        ?>
        <div class="container left error-c">
		    <h3 class="erro404-h">Erro 404 - Página não existe</h3>
		    <p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
        </div>
        <?php
            } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center !important;">Cliente</th>
                        <th style="max-width: 40px; text-align: center !important;">Data de Nascimento</th>
                        <th style="max-width: 40px; text-align: center !important;">Criação</th>
                        <th style="max-width: 40px; text-align: center !important;">Valor</th>
                        <th style="text-align: center !important;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tabelaDados = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        
					    $dataCriacao = explode("-",  $tabelaDados['DATA_CRIACAO']);
					    $cliente = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE ID = '" . $tabelaDados['CLIENTE'] . "'");
                        $cliente = mysqli_fetch_array($cliente);
                        $dataNascimento = explode("-",  $cliente['DATA_NASCIMENTO']);
                        $total = $tabelaDados['TOTAL'];
                        if ($total == "" || $total == null) {
                            $total = "0,00";
                        }

					    echo "<td style='text-align: center !important;'>" . $cliente['CLIENTE'] . "</td>";
                        echo "<td style='text-align: center !important;'>" . $dataNascimento[2] . "/" . $dataNascimento[1] . "/" . $dataNascimento[0] . "</td>";
                        echo "<td style='text-align: center !important;'>" . $dataCriacao[2] . "/" . $dataCriacao[1] . "/" . $dataCriacao[0] . "</td>";
                        echo "<td style='text-align: center !important;'> R$ " . $total . "</td>";
                        echo "<td style='text-align: center !important;'>
                        <a href='painel.php?f=details&user=" . $id . "&orc=" . $tabelaDados['ID'] . "' class='voltar2'>Var Detalhes</a> 
					    <a href='funcoesOrcamento.php?id=" . $tabelaDados['ID'] . "&f=del' class='apagar'>Apagar</a></td>";
					    echo "</tr>";
				    }
                    ?>
                </tbody>
            </table>
            <?php } ?>

	<div class="espacamento"><br><br><br><br></div>
</div>