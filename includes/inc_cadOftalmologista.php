<link rel="stylesheet" href="../css/orcamentos.css?version=454" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=oftalmologista" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Oftalmologista</h4>

		<div class="espacamento"><br><br></div>

		<label class="descricao">Nome Oftalmologista<span class="obrigatorio"> *</span>
			<input type="text" name="txtNomeOftalmo" class="caixa" required>
		</label> 
		<br>
		<label class="descricao">Telefone
			<input type="text" name="txtTelefone" class="caixa alinhar12">
		</label>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br><br><br><br><br></div>
</div> 