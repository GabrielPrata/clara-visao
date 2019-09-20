<link rel="stylesheet" href="../css/orcamentos.css" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
        <h4 class="titulo-form">Funcionarios</h4>
        <?php
            include '../src/conn.php';

            $sql = "SELECT * FROM FUNCIONARIOS ORDER BY NOME DESC LIMIT 25";

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
                        <th style="text-align: center !important;">Nome</th>
                        <th style="max-width: 60px; text-align: center !important;">Código</th>
                        <th style="max-width: 60px; text-align: center !important;">Vendas Diarias</th>
                        <th style="max-width: 60px; text-align: center !important;">Vendas Mensais</th>
                        <th style="max-width: 60px; text-align: center !important;">Status</th>
                        <th style="text-align: center !important;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tabelaDados = mysqli_fetch_array($query)) {
                        if ($tabelaDados['STATUS_FUNC'] != 0) {
                            $status = "<span> Normal </span>";
                            if ($tabelaDados['STATUS_FUNC'] == 2) {
                                $status = "<span> Férias </span>";
                            }
                            
                            echo "<tr>";
                            $day = date('Y-m-d');
                        
                            $vendasDiarias = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE (VENDEDOR_ID = '" . $tabelaDados['ID'] . "') AND (DATA_CRIACAO = '" . $day . "')");
                            $vendasDiarias = mysqli_num_rows($vendasDiarias);

                            $vendasMensais = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE (VENDEDOR_ID = '" . $tabelaDados['ID'] . "') AND (DATA_CRIACAO BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE())");
                            $vMensais = mysqli_num_rows($vendasMensais);

				    	    echo "<td style='text-align: center !important;'>" . $tabelaDados['NOME'] . "</td>";
                            echo "<td style='text-align: center !important;'>" . $tabelaDados['CODIGO'] . "</td>";
                            echo "<td style='text-align: center !important;'>" . $vendasDiarias . "</td>";
                            echo "<td style='text-align: center !important;'>" . $vMensais . "</td>";
                            echo "<td style='text-align: center !important;'>" . $status . "</td>";
                            echo "<td style='text-align: center !important;'>
                            <a href='sobre.php?f=details&user=" . $tabelaDados['ID'] . "' class='voltar2'>Ver Detalhes</a> 
				    	    <a href='apagar.php?f=del&form=func&id=" . $tabelaDados['ID'] . "' class='apagar'>Apagar</a></td>";
                            echo "</tr>";

                        } 
				    }
                    ?>
                </tbody>
            </table>
            <?php } ?>

	<div class="espacamento"><br><br><br><br></div>
</div>