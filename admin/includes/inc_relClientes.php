<link rel="stylesheet" href="../css/orcamentos.css" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
        <h4 class="titulo-form">Clientes</h4>

        <?php
            include '../src/conn.php';

            $query = mysqli_query($conn, "SELECT * FROM CLIENTES ORDER BY CLIENTE ASC LIMIT 50");
            $count = mysqli_num_rows($query);

            if ($count != 0) { ?>
                <table>
                <thead>
                    <tr>
                        <th style="text-align: center !important;">Nome</th>
                        <th style="max-width: 60px; text-align: center !important;">Data de Nascimento</th>
                        <th style="max-width: 60px; text-align: center !important;">Total de Orçamento</th>
                        <th style="text-align: center !important;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($values = mysqli_fetch_assoc($query)) {
                        $day = explode('-', $values['DATA_NASCIMENTO']);
                        $day = $day[2] . "/" . $day[1] . "/" . $day[0];

                        $tOrcamento = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE CLIENTE = '" . $values['ID'] ."'");
                        $tOrcamento = mysqli_num_rows($tOrcamento);

                        print "<tr>";
                        print "<td style='text-align: center !important;'>" . $values['CLIENTE'] . "</td>";
                        print "<td style='text-align: center !important;'>" . $day . "</td>";
                        print "<td style='text-align: center !important;'>" . $tOrcamento . "</td>";
                        print "<td style='text-align: center !important;'> Ver Orçamentos Excluir</td>";
                        print "</tr>";
                    }

                ?>
                </tbody>
                </table>
            <?php
            } else {
             ?>
                <div class="container left error-c">
		            <h3 class="erro404-h">Erro 404 - Página não existe</h3>
		            <p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
                </div>
            <?php 
            } 
            mysqli_close($conn);
            ?>
        
	<div class="espacamento"><br><br><br><br></div>
</div>