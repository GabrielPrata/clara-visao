<link rel="stylesheet" href="../css/orcamentos.css?version=9999" media="screen,projection">

<!-- envia o formulario para a página orcamento.php, passando o valor c por get. c = cadastro de novo orçamento -->
<div class="container center bordas">
	<form action="finalizaOrcamento.php?f=c" method="POST" accept-charset="utf-8">

		<h4 class="titulo-form">Novo orçamento <span class="titulo-form-span">para <?php print $cliente['CLIENTE']; ?></span></h4>

		<div class="cliente">
			<table><caption class="titulo-grupo">Cliente</caption></table>

			<div class="row">

				<div class="col s12 m10">

					<div class="row single">
						<div class="col s4 m2">
							<label class="descricao name">Nome Completo<span class="obrigatorio">*</span> </label> 
						</div>
						<div class="col s8 m10">
							<input class="caixa pesquisar" type="text" name="txtNomeCliente" id="txtNomeCliente" required value="<?php print $cliente['CLIENTE']; ?>">
							<a href="" class="caixaPesquisa" onclick="this.href='consultaCliente.php?name='+document.getElementById('txtNomeCliente').value"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</div>
					</div>

					<div class="row double">
						<div class="col s12 m6">
							<div class="col s4 m3">
								<label class="descricao">Profissão</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtProfissao" value="<?php print $cliente['PROFISSAO']; ?>">
							</div>

						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m4">
								<label class="descricao">Data Nasc.<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" type="date" name="txtDataNascimento" required value="<?php print $cliente['DATA_NASCIMENTO']; ?>">
							</div>
						</div>
					</div>

					<div class="row double2">
						<div class="col s12 m6">
							<div class="col s4 m3">
								<label class="descricao">Telefone 1<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtTelefone1" required value="<?php print $cliente['TELEFONE_1']; ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m4">
								<label class="descricao">Telefone 2</label>
							</div>
							<div class="col s8 m8" >
								<input class="caixa" type="text" name="txtTelefone2" value="<?php print $cliente['TELEFONE_2']; ?>">
							</div>
						</div>
					</div>

					<div class="row double2">
						<div class="col s12 m6">
							<div class="col s4 m3">
								<label class="descricao">Cidade</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtCidade" value="<?php print $cliente['CIDADE']; ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s5 m4">
								<label class="descricao">Vendedor<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s7 m8">
								<div class="col s4 m4">
									<input class="caixa" id="txtVendedorCod" type="text" name="txtVendedorCod" placeholder="Cod.">
								</div>
								<div class="col s8 m8 combo-vendedor">
									<select name="txtVendedor" id="txtVendedor" class="caixa" required onclick="atualizaValor()">
										<?php 
										$query = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS");
										$count = mysqli_num_rows($query);

										if ($count == 0) {
											?> <option value="" disabled="" selected="">Cadastre um Funcionario</option> <?php
										} else {
											while ($array = mysqli_fetch_array($query)) {
												?> <option value="<?php print $array['CODIGO']; ?>"><?php print $array['NOME']; ?></option> <?php
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row double2">
						<div class="col s12 m6">
							<div class="col s4 m3">
								<label class="descricao">Data</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="date" name="txtDataEmissao" value="<?php echo date('Y-m-d'); ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m4">
								<label class="descricao">Data Entrega</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" type="date" name="txtDataEntrega" value="<?php echo date('Y-m-d', strtotime(' +12 days ')); ?>">
							</div>
						</div>
					</div>

				</div>
				<div class="col s12 m2">
					<table cellspacing="0">
						<tr>
							<td>
								<div class="col s5 m3">
									<label class="descricao">Imagem</label>
								</div>
								<div class="col s7 m9">
									<img src="../img/user_padrao.jpg" width="100" height="auto" alt="Usuário sem Foto" class="foto-user center">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col s5 m3">
									<label class="descricao">O.S</label>
								</div>
								<div class="col s7 m9">
									<input class="caixa" type="text" name="textOS" size="3">
								</div>
							</td>
						</tr>
					</table>
				</div>

			</div>
			<!-- Fim de Cliente -->

			<!-- Inicio de Dioptrias -->
			<div class="dioptrias" style="margin-top: -40px !important;">
				<table><caption class="titulo-grupo">Dioptrias e Medidas</caption></table>

				<table cellspacing="0" cellpadding="0" id="dioptrias">
					<tr> 
						<td> </td>
						<td> </td>
						<td>ESF</td>
						<td>CIL</td>
						<td>EIXO</td>
						<td>ADIÇÃO</td>
						<td>DNP</td>
						<td>ALTURA</td>
					</tr>
					<tr>
						<td>LONGE</td>
						<td>OD</td>
						<td><input type="text" name="txtLongeESF_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeCIL_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeEIXO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeADICAO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeDNP_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeALTURA_OD" class="tabelaCampo"></td>
					</tr>
					<tr>
						<td></td>
						<td>OE</td>
						<td><input type="text" name="txtLongeESF_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeCIL_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeEIXO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeADICAO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeDNP_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtLongeALTURA_OE" class="tabelaCampo"></td>
					</tr>
					<tr>
						<td>PERTO</td>
						<td>OD</td>
						<td><input type="text" name="txtPertoESF_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoCIL_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoEIXO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoADICAO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoDNP_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoALTURA_OD" class="tabelaCampo"></td>
					</tr>
					<tr>
						<td></td>
						<td>OE</td>
						<td><input type="text" name="txtPertoESF_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoCIL_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoEIXO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoADICAO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoDNP_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtPertoALTURA_OE" class="tabelaCampo"></td>
					</tr>
					<tr>
						<td>MÉDIA</td>
						<td>OD</td>
						<td><input type="text" name="txtMediaESF_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaCIL_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaEIXO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaADICAO_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaDNP_OD" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaALTURA_OD" class="tabelaCampo"></td>
					</tr>
					<tr>
						<td></td>
						<td>OE</td>
						<td><input type="text" name="txtMediaESF_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaCIL_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaEIXO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaADICAO_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaDNP_OE" class="tabelaCampo"></td>
						<td><input type="text" name="txtMediaALTURA_OE" class="tabelaCampo"></td>
					</tr>
				</table>
				<div class="container oftalmo">
					<div class="row">
						<div class="col s4 m3">
							<label class="descricao">Oftalmologista</label>
						</div>
						<div class="col s8 m9">
							<input class="caixa pesquisar" type="text" name="txtOftalmologista">
							<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</div>
					</div>
				</div>
				<!-- Fim de Dioptrias -->

				<!-- Inicio Descrição de Lentes -->
				<div class="descLentes">
					<table><caption class="titulo-grupo">Descrição de Lentes e Armação</caption></table>

					<div class="row triple">
						<div class="col s12 m4">
							<div class="col s4 m3">
								<label class="descricao">Armação</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtArmacao">
							</div>
						</div>
						<div class="col s12 m4 divide">
							<div class="col s4 m3">
								<label class="descricao">Referencia</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtArmacaoReferencia">
							</div>
						</div>
						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Cód. Loja</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" type="text" name="txtCodLoja">
							</div>
						</div>
					</div>

					<div class="row" style="margin-left: 13px !important;">
						<div class="col s4 m1">
							<label class="descricao">Lente</label>
						</div>
						<div class="col s8 m11">
							<input class="caixa" type="text" name="txtLente">
						</div>
					</div>

					<div class="row" style="margin-left: 13px !important;">
						<div class="col s4 m1">
							<label class="descricao obsdioptrias">Obs.</label>
						</div>
						<div class="col s8 m11">
							<textarea class="materialize-textarea texcaixa" style="margin-top: -10px !important;" name="txtObs"></textarea>
						</div>
					</div>

					<div class="row double3">
						<div class="col s12 m6">
							<div class="col s4 m1">
								<label class="descricao">Lab.</label>
							</div>
							<div class="col s8 m11">
								<select name="txtLaboratorio" class="caixa" required>
									<?php 
									$query = mysqli_query($conn, "SELECT * FROM LABORATORIOS");
									$count = mysqli_num_rows($query);

									if ($count == 0) {
										?> <option value="" disabled="" selected="">Cadastre um Laboratorio</option> <?php
									} else {
										while ($array = mysqli_fetch_array($query)) {
											?> <option value="<?php print $array['ID']; ?>"><?php print $array['NOME']; ?></option> <?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m3">
								<label class="descricao">Tipo Armação</label>
							</div>
							<div class="col s8 m9">
								<select name="txtArmacaoTipo" class="caixa divide" required>
									<?php 
									$query = mysqli_query($conn, "SELECT * FROM ARMACAO");
									$count = mysqli_num_rows($query);

									if ($count == 0) {
										?> <option value="" disabled="" selected="">Cadastre um Tipo de Armação</option> <?php
									} else {
										while ($array = mysqli_fetch_array($query)) {
											?> <option value="<?php print $array['ID']; ?>"><?php print $array['ARMACAO']; ?></option> <?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>

					<div class="row triple">
						<div class="col s12 m4">
							<div class="col s4 m3">
								<label class="descricao">Ponte+Aro</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtPonte">
							</div>
						</div>

						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Diag. Maior</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" type="text" name="txtDiag">
							</div>
						</div>

						<div class="col s12 m4 divide">
							<div class="col s4 m3">
								<label class="descricao">Vertical</label>
							</div>
							<div class="col s8 m9">
								<input class="caixa" type="text" name="txtVertical">
							</div>
						</div>
					</div>
				</div>
				<!-- Fim Descrição de Lentes -->

				<!-- Inicio Pagamento -->
				<div class="pagamento">
					<table><caption class="titulo-grupo">Pagamento</caption></table>

					<div class="row triple">
						<div class="col s12 m4">
							<div class="col s4 m4">
								<label class="descricao">Armação R$</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" id="txtArmacaoPreco" type="text" name="txtArmacaoPreco" min="0" placeholder="0,00" onkeyup="atualizaPreco()">
							</div>
						</div>
						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Lente R$</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" id="txtLentePreco" type="text" name="txtLentePreco" min="0" placeholder="0,00" onkeyup="atualizaPreco()">
							</div>
						</div>
						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Desconto R$</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" id="txtDesconto" type="text" name="txtDesconto" min="0" placeholder="0,00" onkeyup="atualizaPreco()">
							</div>
						</div>
					</div>

					<div class="row triple">

						<div class="col s12 m4">
							<div class="col s4 m4">
								<label class="descricao">Total R$</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" id="txtTotal" type="text" name="txtTotal" min="0" readonly="true" placeholder="0,00">
							</div>
						</div>

						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Forma Pag.</label>
							</div>
							<div class="col s8 m8">
								<select name="txtFormaPag" class="caixa" required>
									<option value="aDefinir" selected="">À definir</option>
									<option value="dinheiro">Dinheiro</option>
									<option value="cartaoDebito">Cartão de Débito</option>
									<option value="cartaoCredito">Cartão de Crédito</option>
									<option value="cheque">Cheque</option>
									<option value="crediarioProprio">Crediário Próprio</option>
									<option value="crediarioTerceiro">Crediário Terceiro</option>
								</select>
							</div>
						</div>

						<div class="col s12 m4 divide">
							<div class="col s4 m4">
								<label class="descricao">Num. Parce.</label>
							</div>
							<div class="col s8 m8">
								<input class="caixa" type="text" name="txtNumParcelas" value="0">
							</div>
						</div>
					</div>
				</div>
				<!-- Fim Pagamento -->
				<br>
				<div style="margin-top: -15px !important;">
					<input type="image" src="../img/check.png" name="finalizar orcamento" value="Finalizar Orçamento" width="85" height="auto" style="margin-bottom: -3.5px !important;">
					<a href="painel.php"><img src="../img/eraser.png" alt="Limpar Dados" width="75" height="auto"></a>
					<a href=""><img src="../img/printer.png" alt="Imprimir" width="75" height="auto"></a>
					<a href="observacoes.php?id=<?php print $cliente['ID']; ?>" target="__blank"><img src="../img/obs.png" alt="Observações" width="75" height="auto"></a>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<script type="text/javascript">
	// Função para atualizar o campo Código do Vendedor, completando ele automaticamente quando é trocado a campo da combobox, se não for trocado o campo ele seleciona o primeiro funcionario da lista

	$(function(){
		var valor = $('#txtVendedor').val();
		$('#txtVendedorCod').val(valor)
	});

	function atualizaValor() {
		var valor = $('#txtVendedor').val();
		$('#txtVendedorCod').val(valor)
	}

	// Função para atualizar os valores e preços de venda dos produtos.
	function atualizaPreco() {
		var armacao = $('#txtArmacaoPreco').val();
		var lente = $('#txtLentePreco').val();
		var desconto = $('#txtDesconto').val();

		var nulo = "0,00";

		if (!armacao) { armacao = nulo; }
		if (!lente) { lente = nulo; }
		if (!desconto) { desconto = nulo; }

		var armacaoF = parseFloat(armacao.replace(',', '.'));
		var lenteF = parseFloat(lente.replace(',', '.'));
		var descontoF = parseFloat(desconto.replace(',', '.'));

		var total = armacaoF + lenteF;
		if (total >= desconto) { total = armacaoF + lenteF - desconto; } else { $('#txtDesconto').val("") }

		$('#txtTotal').val((total).toLocaleString("pt-BR", { minimumFractionDigits: 2,  
			maximumFractionDigits: 2 }));
	}
</script>
