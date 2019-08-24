<link rel="stylesheet" href="../css/orcamentos.css?version=78787" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=cliente" method="POST" accept-charset="utf-8">

		<div class="espacamento"><br><br></div>

		<div class="row">
			<div class="col s12 m10">

				<div class="col s12 m12">
					<div class="col s5 m3">
						<label class="descricao">Nome Completo<span class="obrigatorio">*</span></label>
					</div>
					<div class="col s7 m9">
						<input class="caixa pesquisar" type="text" name="txtNomeCliente" required style="max-width: 83% !important;">
						<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
					</div>
				</div>

				<div class="col s12 m12 divide" style="margin-top: 20px !important;">
					<div class="col s5 m3">
						<label class="descricao">Profissão</label>
					</div>
					<div class="col s7 m9">
						<input class="caixa" type="text" name="txtProfissao">
					</div>
				</div>

				<div class="col s12 m12 divide" style="margin-top: 30px !important;">
					<div class="col s5 m3">
						<label class="descricao">Data Nascimento<span class="obrigatorio">*</span></label>
					</div>
					<div class="col s7 m9">
						<input class="caixa" type="date" name="DataNascimento" required value="<?php echo date('Y-m-d', strtotime(' -18 years ')); ?>">
					</div>
				</div>

				<div class="col s12 m12 divide" style="margin-top: 30px !important;">
					<div class="col s5 m3">
						<label class="descricao">Telefone 1<span class="obrigatorio">*</span></label>
					</div>
					<div class="col s7 m9">
						<input class="caixa" type="text" name="txtTelefone1" required>
					</div>
				</div>

				<div class="col s12 m12 divide" style="margin-top: 30px !important;">
					<div class="col s5 m3">
						<label class="descricao">Telefone 2</label>
					</div>
					<div class="col s7 m9">
						<input class="caixa" type="text" name="txtTelefone2">
					</div>
				</div>

				<div class="col s12 m12 divide" style="margin-top: 30px !important;">
					<div class="col s5 m3">
						<label class="descricao">Cidade</label>
					</div>
					<div class="col s7 m9">
						<input class="caixa" type="text" name="txtCidade" value="Descalvado">
					</div>
				</div>

			</div>

			<div class="col s12 m2" style="margin-top: 30px !important;">
				<div class="col s5 m12">
					<label class="descricao">Imagem</label>
				</div>
				<div class="col s7 m12">
					<img src="../img/user_padrao.jpg" width="100" height="auto" alt="Usuário sem Foto" class="foto-user">
				</div>
			</div>
		</div>

		<div class="espacamento"><br><br><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">

	</form>
	<div class="espacamento"><br><br></div>
</div> 
</form>
</div>