<link rel="stylesheet" href="../css/orcamentos.css" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
        <h4 class="titulo-form">Usuários do sistema</h4>

        <?php
            include '../src/conn.php';

            $query = mysqli_query($conn, "SELECT * FROM USUARIOS ORDER BY NOME ASC LIMIT 50");
            $count = mysqli_num_rows($query);

            if ($count != 0) { ?>
                <table>
                <thead>
                    <tr>
                        <th style="text-align: center !important;">Nome</th>
                        <th style="max-width: 60px; text-align: center !important;">E-mail</th>
                        <th style="max-width: 60px; text-align: center !important;">Telefone</th>
                        <th style="max-width: 60px; text-align: center !important;">Administrador</th>
                        <th style="text-align: center !important;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($values = mysqli_fetch_assoc($query)) {
                        $excluir = "<a href='#'> Excluir </a>";
                        if ($values['ID'] == $_SESSION['admin_id']) {
                            $excluir = "";
                        }

                        $adm = "<span> Não </span>";
                        if ($values['ADM'] == 1) {
                            $adm = "<span> Sim </span>";
                        }

                        print "<tr>";
                        print "<td style='text-align: center !important;'>" . $values['NOME'] . " " . $values['SOBRENOME'] . "</td>";
                        print "<td style='text-align: center !important;'>" . $values['EMAIL'] . "</td>";
                        print "<td style='text-align: center !important;'>" . $values['TELEFONE'] . "</td>";
                        print "<td style='text-align: center !important;'>" . $adm . "</td>";
                        print "<td style='text-align: center !important;'> Editar " . $excluir . "</td>";
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