<link rel="stylesheet" href="../css/orcamentos.css?version=12" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=tipArmacao" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Tipo de Armação</h4>

		<div class="cliente">
			<table>
				<tr>
					<td>
						<label class="descricao">Nome Completo<span class="obrigatorio"> *</span>
							<input class="caixaGrande" type="text" name="txtNomeCliente" required>
							<a href="#" class="caixaPesquisa"><i class="material-icons lupa">search</i></a>
						</label> 
					</td>
				</tr>
			</table>

			<table>

				<tr>
					<td>
						<label class="descricao alinhar">Profissão
							<input class="caixa" type="text" name="txtProfissao">
						</label>
					</td>
					<td>
						<label class="descricao">Data de Nascimento<span class="obrigatorio">*</span>
							<input class="caixa" type="date" name="DataNascimento" required>
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Telefone 1<span class="obrigatorio"> *</span>
							<input class="caixa" type="text" name="txtTelefone1" required>
						</label>
					</td>
					<td>
						<label class="descricao">Telefone 2
							<input class="caixa" type="text" name="txtTelefone2">
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Cidade
							<input class="caixa" type="text" name="txtCidade" value="Descalvado">
						</label>
					</td>
					<td>
						<label class="descricao alinhar">Imagem
							<input class="caixa" type="image" name="Imagem">
						</label>
					</td>
				</tr>
			</table>

			<div class="espacamento"><br><br></div>

			<input type="submit" name="submit" value="Salvar" class="finalizar">
			
		</form>
		<div class="espacamento"><br><br></div>
	</div> 
</form>
</div>