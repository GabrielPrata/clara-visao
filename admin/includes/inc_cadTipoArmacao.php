<link rel="stylesheet" href="../css/orcamentos.css?version=12" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
	<form action="funcoesCadastro.php?f=c&form=tipArmacao" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Armação</h4>

		<div class="espacamento"><br><br></div>

		<div class="row">
			<div class="col s4 m2">
				<label class="descricao">Tipo da Armação<span class="obrigatorio">*</span></label>
			</div>
			<div class="col s8 m10">
				<input type="text" name="txtTipoArm" class="caixa" required>
			</div>
		</div>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br><br><br><br><br></div>
</div> 