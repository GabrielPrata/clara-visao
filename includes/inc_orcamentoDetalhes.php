<link rel="stylesheet" href="../css/orcamentos.css?version=899898989" media="screen,projection">

<!-- envia o formulario para a página orcamento.php, passando o valor c por get. c = cadastro de novo orçamento -->
<div class="container center bordas">
	<form action="finalizaOrcamento.php?f=c" method="POST" accept-charset="utf-8">

		<h4 class="titulo-form">Orçamento <span class="titulo-form-span">nº<?php print $orcamento; ?></span></h4>

		<div class="cliente">
			<table><caption class="titulo-grupo">Cliente</caption></table>

			<div class="row">

				<div class="col s12 m12 l10">

					<div class="row single">
						<div class="col s4 m3 l2">
							<label class="descricao name">Nome Completo<span class="obrigatorio">*</span> </label> 
						</div>
						<div class="col s8 m9 l10">
							<?php $nomeCliente = strtolower($cliente['CLIENTE']); ?>
							<input class="caixa pesquisar boxNome" type="text" name="txtNomeCliente" id="txtNomeCliente" required value="<?php print $nomeCliente; ?>">
							<a href="" class="caixaPesquisa" onclick="this.href='consultaCliente.php?name='+document.getElementById('txtNomeCliente').value"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</div>
					</div>

					<div class="row double">
						<div class="col s12 m6">
							<div class="col s4 m3 l3">
								<label class="descricao">Profissão</label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="text" name="txtProfissao" value="<?php print $cliente['PROFISSAO']; ?>">
							</div>

						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m3 l3">
								<label class="descricao">Data Nasc.<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="date" name="txtDataNascimento" required value="<?php print $cliente['DATA_NASCIMENTO']; ?>">
							</div>
						</div>
					</div>

					<div class="row double2">
						<div class="col s12 m6">
							<div class="col s4 m3 l3">
								<label class="descricao">Telefone 1<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="text" name="txtTelefone1" required id="telefone" value="<?php print $cliente['TELEFONE_1']; ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m3 l3">
								<label class="descricao">Telefone 2</label>
							</div>
							<div class="col s8 m9 l9" >
								<input class="caixa" type="text" name="txtTelefone2" id="telefone2" value="<?php print $cliente['TELEFONE_2']; ?>">
							</div>
						</div>
					</div>

					<div class="row double2">
						<div class="col s12 m6">
							<div class="col s4 m3 l3">
								<label class="descricao">Cidade</label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="text" name="txtCidade" value="<?php print $cliente['CIDADE']; ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s5 m3 l3">
								<label class="descricao">Vendedor<span class="obrigatorio">*</span></label>
							</div>
							<div class="col s7 m9 l9">
								<div class="col s4 m4">
									<?php 
									$query = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS WHERE ID='" . $orcamentos['VENDEDOR_ID'] . "'");
									$vend = mysqli_fetch_array($query);
									?>
									<input class="caixa boxId" id="txtVendedorCod" type="text" name="txtVendedorCod" placeholder="Cod." value="<?php print $vend['CODIGO']; ?>">
								</div>
								<div class="col s8 m8 combo-vendedor">
									<select name="txtVendedor" id="txtVendedor" class="caixa boxCombo boxVendedor" required onclick="atualizaValor()">
									<?php 

									$query = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS");
									$count = mysqli_num_rows($query);

									if ($count == 0) {
										?> <option value="" disabled="" selected="">Cadastre um Funcionario</option> <?php
									} else {
										?> <option value="<?php print $vend['CODIGO'] ?>" selected=""><?php print $vend['NOME'] ?></option> <?php
										while ($array = mysqli_fetch_array($query)) {
											if ($array['ID'] != $orcamentos['VENDEDOR_ID']) {
												if ($array['STATUS_FUNC'] != 0) {
													if ($array['STATUS_FUNC'] != 2) {
														?> <option value="<?php print $array['CODIGO']; ?>"><?php print $array['NOME']; ?></option> <?php
													}
												}
											}
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
							<div class="col s4 m3 l3">
								<label class="descricao">Data</label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="date" name="txtDataEmissao" value="<?php print $orcamentos['DATA_CRIACAO']; ?>">
							</div>
						</div>
						<div class="col s12 m6 divide">
							<div class="col s4 m3 l3">
								<label class="descricao">Data Entrega</label>
							</div>
							<div class="col s8 m9 l9">
								<input class="caixa" type="date" name="txtDataEntrega" value="<?php print $orcamentos['DATA_ENTREGA']; ?>">
							</div>
						</div>
					</div>

				</div>
				<div class="col s12 m12 l2">
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
									<input class="caixa" type="text" name="textOS" size="3" value="<?php print $orcamentos['OS']; ?>">
								</div>
							</td>
						</tr>
					</table>
				</div>

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
						<td><input type="text" name="txtLongeESF_OD" class="tabelaCampo" value="<?php print $medidas['LONGE_OD_ESF']; ?>"></td>
						<td><input type="text" name="txtLongeCIL_OD" class="tabelaCampo" value="<?php print $medidas['LONGE_OD_CIL']; ?>"></td>
						<td><input type="text" name="txtLongeEIXO_OD" class="tabelaCampo" value="<?php print $medidas['LONGE_OD_EIXO']; ?>"></td>
						<td><input type="text" name="txtLongeADICAO_OD" class="tabelaCampo" value="<?php print $medidas['LONGE_OD_ADICAO']; ?>"></td>
						<td><input type="text" name="txtLongeDNP_OD" class="tabelaCampo" value="<?php print $medidas['LONGE_OD_DNP']; ?>"></td>
						<td><input type="text" name="txtLongeALTURA_OD" class="tabelaCampo" value="<?php print $medidas['LNGE_OD_ALTURA']; ?>"></td>
					</tr>
					<tr>
					<td></td>
						<td>OE</td>
						<td><input type="text" name="txtLongeESF_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_ESF']; ?>"></td>
						<td><input type="text" name="txtLongeCIL_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_CIL']; ?>"></td>
						<td><input type="text" name="txtLongeEIXO_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_EIXO']; ?>"></td>
						<td><input type="text" name="txtLongeADICAO_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_ADICAO']; ?>"></td>
						<td><input type="text" name="txtLongeDNP_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_DNP']; ?>"></td>
						<td><input type="text" name="txtLongeALTURA_OE" class="tabelaCampo" value="<?php print $medidas['LONGE_OE_ALTURA']; ?>"></td>
					</tr>
					<tr>
						<td>PERTO</td>
						<td>OD</td>
						<td><input type="text" name="txtPertoESF_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_ESF']; ?>"></td>
						<td><input type="text" name="txtPertoCIL_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_CIL']; ?>"></td>
						<td><input type="text" name="txtPertoEIXO_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_EIXO']; ?>"></td>
						<td><input type="text" name="txtPertoADICAO_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_ADICAO']; ?>"></td>
						<td><input type="text" name="txtPertoDNP_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_DNP']; ?>"></td>
						<td><input type="text" name="txtPertoALTURA_OD" class="tabelaCampo" value="<?php print $medidas['PERTO_OD_ALTURA']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td>OE</td>
						<td><input type="text" name="txtPertoESF_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_ESF']; ?>"></td>
						<td><input type="text" name="txtPertoCIL_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_CIL']; ?>"></td>
						<td><input type="text" name="txtPertoEIXO_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_EIXO']; ?>"></td>
						<td><input type="text" name="txtPertoADICAO_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_ADICAO']; ?>"></td>
						<td><input type="text" name="txtPertoDNP_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_DNP']; ?>"></td>
						<td><input type="text" name="txtPertoALTURA_OE" class="tabelaCampo" value="<?php print $medidas['PERTO_OE_ALTURA']; ?>"></td>
					</tr>
					<tr>
						<td>MÉDIA</td>
						<td>OD</td>
						<td><input type="text" name="txtMediaESF_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_ESF']; ?>"></td>
						<td><input type="text" name="txtMediaCIL_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_CIL']; ?>"></td>
						<td><input type="text" name="txtMediaEIXO_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_EIXO']; ?>"></td>
						<td><input type="text" name="txtMediaADICAO_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_ADICAO']; ?>"></td>
						<td><input type="text" name="txtMediaDNP_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_DNP']; ?>"></td>
						<td><input type="text" name="txtMediaALTURA_OD" class="tabelaCampo" value="<?php print $medidas['MEDIA_OD_ALTURA']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td>OE</td>
						<td><input type="text" name="txtMediaESF_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_ESF']; ?>"></td>
						<td><input type="text" name="txtMediaCIL_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_CIL']; ?>"></td>
						<td><input type="text" name="txtMediaEIXO_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_EIXO']; ?>"></td>
						<td><input type="text" name="txtMediaADICAO_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_ADICAO']; ?>"></td>
						<td><input type="text" name="txtMediaDNP_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_DNP']; ?>"></td>
						<td><input type="text" name="txtMediaALTURA_OE" class="tabelaCampo" value="<?php print $medidas['MEDIA_OE_ALTURA']; ?>"></td>
					</tr>
				</table>
				<div class="container center-align oftalmo">
					<div class="row">
						<div class="col s4 m2">
							<label class="descricao">Oftalmologista</label>
						</div>
						<div class="col s8 m10">
							<input class="caixa pesquisar boxOftalmo" type="text" name="txtOftalmologista" value="<?php print $orcamentos['OFTALMOLOGISTA']; ?>">
							<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim de Dioptrias -->

			<!-- Inicio Descrição de Lentes -->
			<div class="descLentes">
				<table><caption class="titulo-grupo">Descrição de Lentes e Armação</caption></table>

				<div class="row triple">
					<div class="col s12 m4">
						<div class="col s4 m4 l3">
							<label class="descricao">Armação</label>
						</div>
			
						<div class="col s8 m8 l9">
							<input class="caixa" type="text" name="txtArmacao" value="<?php print $orcamentos['ARMACAO']; ?>">
						</div>
					</div>

					<div class="col s12 m4 divide">
						<div class="col s4 m4 l3">
							<label class="descricao">Referencia</label>
						</div>
						<div class="col s8 m8 l9">
							<input class="caixa txtReferencia" type="text" name="txtArmacaoReferencia" value="<?php print $orcamentos['ARMACAO_REFERENCIA']; ?>">
						</div>
					</div>
					
					<div class="col s12 m4 divide">
						<div class="col s4 m4 l4">
							<label class="descricao">Cód. Loja</label>
						</div>
						<div class="col s8 m8 l8">
							<input class="caixa" type="text" name="txtCodLoja" value="<?php print $orcamentos['COD_LOJA']; ?>">
						</div>
					</div>
				</div>

				<div class="row" style="margin-left: 13px !important;">
					<div class="col s4 m4 l2">
						<label class="descricao">Lente</label>
					</div>
					<div class="col s8 m8 l10">
						<input class="caixa boxLente" type="text" name="txtLente" value="<?php print $orcamentos['LENTE']; ?>">
					</div>
				</div>

				<div class="row rowBox" style="margin-left: 13px !important;">
					<div class="col s4 m4 l2">
						<label class="descricao obsdioptrias">Obs.</label>
					</div>
					<div class="col s8 m8 l10">
						<textarea class="materialize-textarea texcaixa boxTextArea" name="txtObs"><?php print $orcamentos['OBSERVACAO']; ?></textarea>
					</div>
				</div>

				<div class="row double3">
					<div class="col s12 m6">
						<div class="col s4 m4 l3">
							<label class="descricao">Lab.</label>
						</div>
						<div class="col s8 m8 l9">
							<select name="txtLaboratorio" class="caixa boxCombo" required>
							<?php 
								$query = mysqli_query($conn, "SELECT * FROM LABORATORIOS WHERE ID='" . $orcamentos['LABORATORIO'] . "'");
								$lab = mysqli_fetch_array($query);

								$query = mysqli_query($conn, "SELECT * FROM LABORATORIOS");
								$count = mysqli_num_rows($query);

								if ($count == 0) {
									?> <option value="" disabled="" selected="">Cadastre um Laboratorio</option> <?php
								} else {
									?> <option value="<?php print $lab['ID'] ?>" selected=""><?php print $lab['NOME'] ?></option> <?php
									while ($array = mysqli_fetch_array($query)) {
										if ($array['ID'] != $orcamentos['LABORATORIO']) {
											?> 
											<option value="<?php print $array['ID']; ?>"><?php print $array['NOME']; ?></option>
											<?php
										}
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="col s12 m6 divide">
						<div class="col s4 m4 l3">
							<label class="descricao">Tipo Armação</label>
						</div>
						<div class="col s8 m8 l9">
							<select name="txtArmacaoTipo" class="caixa boxCombo" required>
							<?php 
								$query = mysqli_query($conn, "SELECT * FROM ARMACAO WHERE ID='" . $orcamentos['ARMACAO_TIPO'] . "'");
								$arm = mysqli_fetch_array($query);

								$query = mysqli_query($conn, "SELECT * FROM ARMACAO");
								$count = mysqli_num_rows($query);

								if ($count == 0) {
									?> <option value="" disabled="" selected="">Cadastre um Tipo de Armação</option> <?php
								} else {
									?> <option value="<?php print $arm['ID'] ?>" selected=""><?php print $arm['ARMACAO'] ?></option> <?php
									while ($array = mysqli_fetch_array($query)) {
										if ($array['ID'] != $orcamentos['ARMACAO_TIPO']) {
											?> 
											<option value="<?php print $array['ID']; ?>"><?php print $array['ARMACAO']; ?></option> 
											<?php
										}
									}
								}
								?>
							</select>
						</div>
					</div>
				</div>

				<div class="row triple">
					<div class="col s12 m4">
						<div class="col s4 m5 l4">
							<label class="descricao">Ponte+Aro</label>
						</div>
						<div class="col s8 m7 l8">
							<input class="caixa" type="text" name="txtPonte" value="<?php print $orcamentos['PONTE_ARO']; ?>">
						</div>
					</div>

					<div class="col s12 m4 divide">
						<div class="col s4 m5 l4">
							<label class="descricao">Diag. Maior</label>
						</div>
						<div class="col s8 m7 l8">
							<input class="caixa" type="text" name="txtDiag" value="<?php print $orcamentos['DIAG_MAIOR']; ?>">
						</div>
					</div>

					<div class="col s12 m4 divide">
						<div class="col s4 m5 l4">
							<label class="descricao">Vertical</label>
						</div>
						<div class="col s8 m7 l8">
							<input class="caixa" type="text" name="txtVertical" value="<?php print $orcamentos['VERTICAL']; ?>">
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
						<div class="col s4 m6 l4">
							<label class="descricao">Armação R$</label>
						</div>
						<div class="col s8 m6 l8">
							<input class="caixa" id="txtArmacaoPreco" type="text" name="txtArmacaoPreco" min="0" placeholder="0,00" onkeyup="atualizaPreco()" value="<?php print $orcamentos['ARMACAO_PRECO']; ?>">
						</div>
					</div>
					<div class="col s12 m4 divide">
						<div class="col s4 m6 l4">
							<label class="descricao">Lente R$</label>
						</div>
						<div class="col s8 m6 l8">
							<input class="caixa" id="txtLentePreco" type="text" name="txtLentePreco" min="0" placeholder="0,00" onkeyup="atualizaPreco()" value="<?php print $orcamentos['LENTE_PRECO']; ?>">
						</div>
					</div>
					<div class="col s12 m4 divide">
						<div class="col s4 m6 l4">
							<label class="descricao">Desconto R$</label>
						</div>
						<div class="col s8 m6 l8">
							<input class="caixa" id="txtDesconto" type="text" name="txtDesconto" min="0" placeholder="0,00" onkeyup="atualizaPreco()" value="<?php print $orcamentos['DESCONTO']; ?>">
						</div>
					</div>
				</div>

				<div class="row triple">
					<div class="col s12 m4">
						<div class="col s4 m6 l4">
							<label class="descricao">Total R$</label>
						</div>
						<div class="col s8 m6 l8">
							<input class="caixa" id="txtTotal" type="text" name="txtTotal" min="0" readonly="true" placeholder="0,00" value="<?php print $orcamentos['TOTAL']; ?>">
						</div>
					</div>

					<div class="col s12 m4 divide">
						<div class="col s4 m6 l4">
							<label class="descricao">Forma Pag.</label>
						</div>
						<div class="col s8 m6 l8">
							<select name="txtFormaPag" class="caixa boxCombo" required>
							<?php 
									$valores = array(
										'aDefinir' => 'À definir',
										'dinheiro' => 'Dinheiro',
										'cartaoDebito' => 'Cartão de Débito',
										'cartaoCredito' => 'Cartão de Crédito',
										'cheque' => 'Cheque',
										'crediarioProprio' => 'Crediário Próprio',
										'crediarioTerceiro' => 'Crediário Terceiro' 
									);

									foreach ($valores as $key => $value) {
										if ($key == $orcamentos['FORMA_PAG']) {
											?> <option value="<?php print $key; ?>" selected=""><?php print $value; ?></option> <?php
										} else {
											?> <option value="<?php print $key; ?>"><?php print $value; ?></option> <?php
										}
									}
								?>
							</select>
						</div>
					</div>

					<div class="col s12 m4 divide">
						<div class="col s4 m6 l4">
							<label class="descricao">Num. Parce.</label>
						</div>
						<div class="col s8 m6 l8">
							<input class="caixa" type="text" name="txtNumParcelas" value="<?php print $orcamentos['NUM_PARCELAS']; ?>">
						</div>
					</div>
					
				</div>
				<!-- Fim Pagamento -->
				<br>
				<div style="margin-top: -15px !important;">
					<input type="image" src="../img/check.png" name="finalizar orcamento" value="Finalizar Orçamento" width="85" height="auto" style="margin-bottom: -3.5px !important;">
					<a href="painel.php"><img src="../img/eraser.png" alt="Limpar Dados" width="75" height="auto"></a>
					<a href=""><img src="../img/printer.png" alt="Imprimir" width="75" height="auto"></a>
					<a href="observacoes.php?id=<?php print $cliente['ID']; ?>" target="_blank"><img src="../img/obs.png" alt="Observações" width="75" height="auto"></a>
				</div>
			</div>
		
	</form>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
<script type="text/javascript" src="../js/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="../js/orcamento.js"></script>
