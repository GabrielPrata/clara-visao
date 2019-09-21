<link rel="stylesheet" href="../css/orcamentos.css?version=1245" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">
<?php 
	$query = mysqli_query($conn, "SELECT * FROM USUARIOS WHERE ID = '$id'");
	$values = mysqli_fetch_array($query);
?>

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
	<form action="apagar.php?f=update&form=usuarios&id=<?php print $id; ?>" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form alinhar">Detalhes do Usuários do sistema</h4>

        <div class="espacamento"><br><br></div>
        
        <div class="row">
			<div class="col s12 m12">
				<div class="col s3 m2">
					<label class="descricao">Nome<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtNome" class="caixa" required value="<?php print $values['NOME']; ?>">
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Sobrenome<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtSobrenome" class="caixa" required value="<?php print $values['SOBRENOME']; ?>">
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Username (Login)<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtUsername" class="caixa" required value="<?php print $values['USERNAME']; ?>">
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">E-mail<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtEmail" class="caixa" required value="<?php print $values['EMAIL']; ?>">
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Administrador</label>
				</div>
				<div class="col s9 m10">
				<!-- PAREI AQUI -->
                  <select class="form-control" name="txtAdmin">
				  	<?php
						$status1 = "<option value='0'>Não</option>";
						$status2 = "<option value='1'>Sim</option>";
						if ($values['ADM'] == 0) {
							$status1 = "<option value='0' selected>Não</option>";
							$status2 = "<option value='1'>Sim</option>";
						} else {
							$status1 = "<option value='0'>Não</option>";
							$status2 = "<option value='1' selected>Sim</option>";
						}
						print $status1;
						print $status2;
					?>
                  </select>
            
                </div>
            </div>

            <div class="col s12 m12" style="margin-top: 30px !important;">
				<div class="col s3 m2">
					<label class="descricao">Telefone</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtTelefone" class="caixa" id="telefone" value="<?php print $values['TELEFONE']; ?>">
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