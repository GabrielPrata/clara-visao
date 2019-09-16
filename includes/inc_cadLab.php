<link rel="stylesheet" href="../css/orcamentos.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center">
	<form action="funcoesCadastro.php?f=c&form=lab" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form">Cadastro de Laboratório</h4>

		<div class="espacamento"><br><br></div>

		<div class="row">
			<div class="col s12 m12">
				<div class="col s3 m3">
					<label class="descricao">Nome Lab.<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m9">
					<input type="text" name="txtLab" class="caixa" required>
				</div>
			</div>
			<div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m3">
					<label class="descricao">Endereço</label>
				</div>
				<div class="col s9 m9">
					<input type="text" name="txtEndereco" class="caixa">
				</div>
			</div>
			<div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m3">
					<label class="descricao">Telefone</label>
				</div>
				<div class="col s9 m9">
					<input type="text" name="txtTelefone" class="caixa" id="telefone">
				</div>
			</div>
		</div>

		<div class="espacamento"><br><br></div>

		<input type="submit" name="submit" value="Salvar" class="finalizar">
	</form>
	<div class="espacamento"><br><br><br><br></div>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
<script type="text/javascript" src="../js/orcamento.js"></script>