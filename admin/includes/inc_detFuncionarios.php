<link rel="stylesheet" href="../css/orcamentos.css?version=1245" media="screen,projection">
<link rel="stylesheet" href="css/techideia.css?version=54545" media="screen,projection">
<?php 
	$query = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS WHERE ID = '$id'");
	$values = mysqli_fetch_array($query);
?>

<!-- envia o formulario para a página funcoesCadastro.php-->
<div class="container center cadastro">
	<form action="apagar.php?f=update&form=func&id=<?php print $values['id']; ?>" method="POST" accept-charset="utf-8">
		<h4 class="titulo-form alinhar">Detalhes do Funcionario</h4>

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

            <div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">E-mail</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtEmail" class="caixa" value="<?php print $values['EMAIL']; ?>">
				</div>
            </div>
            
			<div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">Código<span class="obrigatorio">*</span></label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtCodigo" class="caixa" required value="<?php print $values['CODIGO']; ?>">
				</div>
            </div>
            
			<div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">Telefone</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtTelefone" class="caixa" value="<?php print $values['TELEFONE']; ?>">
				</div>
            </div>

            <div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">Bairro</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtBairro" class="caixa" value="<?php print $values['BAIRRO']; ?>">
				</div>
            </div>
            
            
            <div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">Endereço</label>
				</div>
				<div class="col s9 m10">
					<input type="text" name="txtEndereco" class="caixa" value="<?php print $values['ENDERECO']; ?>">
				</div>
			</div>
			
			<div class="col s12 m12" style="margin-top: 20px !important;">
				<div class="col s3 m2">
					<label class="descricao">Status</label>
				</div>
				<div class="col s9 m10">
					<option value=""></option>
					<select name="txtStatus">
						<?php
							$status1 = "<option value='1'>Normal</option>";
							$status2 = "<option value='2'>Férias</option>";
							if ($values['STATUS_FUNC'] == 1) {
								$status1 = "<option value='1' selected>Normal</option>";
								$status2 = "<option value='2'>Férias</option>";
							} else {
								$status1 = "<option value='1'>Normal</option>";
								$status2 = "<option value='2' selected>Férias</option>";
							}
							print $status1;
							print $status2;
						?>
					</select>
				</div>
            </div>
        </div>
        
        <div class="espacamento"><br><br></div>

        <input type="submit" name="submit" value="Salvar" class="finalizar">
    </form>
</div>