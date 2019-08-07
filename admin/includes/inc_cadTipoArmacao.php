<link rel="stylesheet" href="css/cadastros.css?version=4548" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=tipArmacao" method="POST" accept-charset="utf-8">

		<div class="espacamento"><br><br></div>

		<label class="descricao">Tipo da Armação<span class="obrigatorio"> *</span>
			<input type="text" name="txtTipoArm" class="caixa" required>
		</label>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br><br><br><br><br></div>
</div> 