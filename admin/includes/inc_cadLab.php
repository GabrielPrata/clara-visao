<link rel="stylesheet" href="css/cadastros.css?version=4548" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=lab" method="POST" accept-charset="utf-8">
		<div class="espacamento"><br><br></div>

		<label class="descricao">Nome do Laboratorio<span class="obrigatorio"> *</span>
			<input type="text" name="txtLab" class="caixa" required>
		</label> 
		<label class="descricao">Endereço
			<input type="text" name="txtEndereco" class="caixa alinhar2">
		</label>
		<label class="descricao">Telefone
			<input type="text" name="txtTelefone" class="caixa alinhar">
		</label>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br><br><br></div>
</div>