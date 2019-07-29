<link rel="stylesheet" href="../css/orcamentos.css?version=1245" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=tipArmacao" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Clientes</h4>

		<div class="cliente">

			<div class="bloco-left">

				<table cellspacing="0">
					<tr>
						<td class="reduz-espaco">
							<label class="descricao">Nome Completo<span class="obrigatorio"> *</span>
								<input class="caixa exp alinhar7 pesquisar" type="text" name="txtNomeCliente" required>
								<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
							</label> 
						</td>
					</tr>
				</table>

				<table cellspacing="0">

					<tr>
						<td>
							<label class="descricao">Profissão
								<input class="caixa alinhar" type="text" name="txtProfissao">
							</label>
						</td>
						<td>
							<label class="descricao">Data Nascimento<span class="obrigatorio">*</span>
								<input class="caixa" type="date" name="DataNascimento" required value="<?php echo date('Y-m-d', strtotime(' -18 years ')); ?>">
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class="descricao">Telefone 1<span class="obrigatorio"> *</span>
								<input class="caixa alinhar2" type="text" name="txtTelefone1" required>
							</label>
						</td>
						<td>
							<label class="descricao">Telefone 2
								<input class="caixa alinhar2" type="text" name="txtTelefone2">
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class="descricao">Cidade
								<input class="caixa alinhar3" type="text" name="txtCidade" value="Descalvado">
							</label>
						</td>
					</tr>
				</table>

			</div> <!-- Fim do bloco left -->

			<div class="bloco-right">
				<table cellspacing="0">
					<tr>
						<td>
							<label class="descricao alinhar">Imagem
							</label>
							<img src="../img/user_padrao.jpg" width="100" height="auto" alt="Usuário sem Foto" class="foto-user">
						</td>
					</tr>
				</table>
			</div> <!-- Fim do bloco right -->
		</div>


		<div class="espacamento"><br><br><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">

	</form>
	<div class="espacamento"><br><br></div>
</div> 
</form>
</div>