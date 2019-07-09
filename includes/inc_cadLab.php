<link rel="stylesheet" href="../css/orcamentos.css?version=124" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=lab" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Laboratório</h4>

		<div class="espacamento"><br><br></div>

		<label class="descricao">Nome do Laboratorio<span class="obrigatorio"> *</span>
			<input type="text" name="txtLab" class="caixa" required>
		</label>
		<label class="descricao">Endereço
			<input type="text" name="txtEndereco" class="caixa">
		</label>
		<label class="descricao">Bairro
			<input type="text" name="txtBairro" class="caixa">
		</label>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br></div>
</div>