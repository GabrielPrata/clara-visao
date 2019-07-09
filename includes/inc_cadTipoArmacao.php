<link rel="stylesheet" href="../css/orcamentos.css?version=12" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=tipArmacao" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Tipo de Armação</h4>

		<div class="espacamento"><br><br></div>

		<label class="descricao">Tipo de Armação<span class="obrigatorio"> *</span>
			<input type="text" name="txtTipoArm" class="caixa" required>
		</label>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br></div>
</div> 