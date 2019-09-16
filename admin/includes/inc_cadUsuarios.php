<link rel="stylesheet" href="../css/orcamentos.css?version=1245" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
	<form action="funcoesCadastro.php?f=c&form=usuarios" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form alinhar">Cadastro de Usuários do sistema</h4>

        <div class="espacamento"><br><br></div>
        
        <div class="row">
			<div class="col s12 m12">
				<div class="col s3 m2">
					<label class="descricao">Nome<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtNome" class="caixa" required>
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Sobrenome<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtSobrenome" class="caixa" required>
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Username (Login)<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtUsername" class="caixa" required>
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">E-mail<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtEmail" class="caixa" required>
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Senha<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="password" name="txtSenha" class="caixa" required>
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Administrador</label>
				</div>
				<div class="col s9 m10">
				<!-- PAREI AQUI -->
                  <select class="form-control" name="txtAdmin">
                    <option value="0" selected>Não</option>
                    <option value="1">Sim</option>
                  </select>
            
                </div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Telefone</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtTelefone" class="caixa" id="telefone">
				</div>
            </div>

            
        </div>
        
        <div class="espacamento"><br><br></div>

        <input type="submit" name="submit" value="Salvar" class="finalizar">
    </form>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
<script type="text/javascript" src="../js/orcamento.js"></script>