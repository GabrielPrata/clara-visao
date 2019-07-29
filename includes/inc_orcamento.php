<link rel="stylesheet" href="../css/orcamentos.css?version=1278" media="screen,projection">

<!-- envia o formulario para a página orcamento.php, passando o valor c por get. c = cadastro de novo orçamento -->
<div class="container center bordas">
	<form action="orcamento.php?f=c" method="POST" accept-charset="utf-8">

		<h4 class="titulo-form">Orçamento <span class="titulo-form-span">nº<?php print $orcamento; ?></span></h4>

		<div class="cliente">
			<table><caption class="titulo-grupo">Cliente</caption></table>

			<div class="bloco-left">

				<table cellspacing="0">
					<tr>
						<td class="reduz-espaco">
							<label class="descricao">Nome Completo<span class="obrigatorio"> *</span>
								<input class="caixa exp alinhar7 pesquisar" type="text" name="txtNomeCliente" required>
								<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
							</label> 
						</td>
					</tr>
				</table>

				<table cellspacing="0">

					<tr>
						<td>
							<label class="descricao">Profissão
								<input class="caixa alinhar" type="text" name="txtProfissao">
							</label>
						</td>
						<td>
							<label class="descricao">Data Nascimento<span class="obrigatorio">*</span>
								<input class="caixa" type="date" name="DataNascimento" required value="<?php echo date('Y-m-d', strtotime(' -18 years ')); ?>">
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class="descricao">Telefone 1<span class="obrigatorio"> *</span>
								<input class="caixa alinhar2" type="text" name="txtTelefone1" required>
							</label>
						</td>
						<td>
							<label class="descricao">Telefone 2
								<input class="caixa alinhar2" type="text" name="txtTelefone2">
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class="descricao">Cidade
								<input class="caixa alinhar3" type="text" name="txtCidade" value="Descalvado">
							</label>
						</td>
						<td>
							<label class="descricao">Vendedor
								<input class="caixa vend-cod alinhar5" type="text" name="txtVendedorCod" size="3" placeholder="Cod.">
								<input class="caixa combo-vendedor" type="text" name="txtVendedor" size="8">
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label class="descricao">Data
								<input class="caixa alinhar4" type="date" name="DataEmissao" value="<?php echo date('Y-m-d'); ?>">
							</label>
						</td>
						<td>
							<label class="descricao">Data Entrega
								<input class="caixa alinhar6" type="date" name="DataEntrega" value="<?php echo date('Y-m-d', strtotime(' +12 days ')); ?>">
							</label>
						</td>
					</tr>
				</table>

			</div> <!-- Fim do bloco left -->

			<div class="bloco-right">
				<table cellspacing="0">
					<tr>
						<td>
							<label class="descricao alinhar">Imagem
							</label>
							<img src="../img/user_padrao.jpg" width="100" height="auto" alt="Usuário sem Foto" class="foto-user">
						</td>
					</tr>
					<tr>
						<td>
							<label class="descricao">O.S
								<input class="caixa" type="text" name="textOS" size="3">
							</label>
						</td>
					</tr>
				</table>
			</div> <!-- Fim do bloco right -->
		</div>

		<!-- Fim de Cliente -->

		<!-- Inicio de Dioptrias -->
		<div class="dioptrias">
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
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
				<tr>
					<td></td>
					<td>OE</td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
				<tr>
					<td>PERTO</td>
					<td>OD</td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
				<tr>
					<td></td>
					<td>OE</td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
				<tr>
					<td>MÉDIA</td>
					<td>OD</td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
				<tr>
					<td></td>
					<td>OE</td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
					<td><input type="text" name="" class="tabelaCampo"></td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="text-align: center;">
						<label class="descricao">Oftalmologista
							<input class="caixa pesquisar" type="text" name="txtOftalmologista" required="">
							<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</label>
					</table>
				</td>
			</tr>
		</div>
		<!-- Fim de Dioptrias -->

		<!-- Inicio Descrição de Lentes -->
		<div class="descLentes">
			<table>
				<caption class="titulo-grupo">Descrição de Lentes e Armação</caption>
				<tr>
					<td>
						<label class="descricao">Armação
							<input class="caixa max2" type="text" name="txtArmacao">
						</label>
					</td>
					<td>
						<label class="descricao">Referencia
							<input class="caixa max2" type="text" name="txtArmacaoReferencia">
						</label>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<label class="descricao">Lente
							<input class="caixa max3 alinhar8" type="text" name="txtLente">
						</label>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<label class="descricao obsdioptrias">Obs.</label>
					</td>
					<td>
						<textarea class="materialize-textarea texcaixa max4 alinhar9"></textarea>
					</td>
				</tr>	
			</table>
			<table>
				<tr>
					<td>
						<label class="descricao">Lab.
							<input class="caixa max2 pesquisar alinhar6" type="text" name="txtLaboratorio">
							<a href="#" class="caixaPesquisa"><img class="lupa" src="../img/lupa.png" width="33" height="auto" alt="Pesquisar"></a>
						</label>
					</td>
					<td>
						<label class="descricao">Tipo de Armação
							<input class="caixa max5" type="text" name="txtArmacaoTipo">
						</label>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<label class="descricao">Ponte+Aro
							<input class="caixa" type="text" name="txtPonte">
						</label>
					</td>
					<td>
						<label class="descricao">Diag. Maior
							<input class="caixa" type="text" name="txtDiag">
						</label>
					</td>
					<td>
						<label class="descricao">Vertical
							<input class="caixa" type="text" name="txtVertical">
						</label>
					</td>
				</tr>
			</table>
		</div>
		<!-- Fim Descrição de Lentes -->

		<!-- Inicio Pagamento -->
		<div class="pagamento">
			<table>
				<caption class="titulo-grupo">Pagamento</caption>
				<tr>
					<td>
						<label class="descricao">Armação
							<input class="caixa" type="number" name="txtArmacaoPreco" min="0">
						</label>
					</td>
					<td>
						<label class="descricao">Lente
							<input class="caixa" type="number" name="txtLentePreco" min="0">
						</label>
					</td>
					<td>
						<!-- readonly="true" -->
						<label class="descricao">Subtotal
							<input class="caixa subtotal" type="number" name="txtSubtotal" min="0">
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao">Desconto
							<input class="caixa" type="number" name="txtDesconto" min="0">
						</label>
					</td>
					<td>
						<label class="descricao">Total
							<input class="caixa" type="number" name="txtTotal" min="0" readonly="true">
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao">Forma Pag.
							<input class="caixa" type="text" name="txtFormaPag">
						</label>
					</td>
					<td>
						<label class="descricao">Num. de Parcelas
							<input class="caixa" type="text" name="txtNumParcelas">
						</label>
					</td>
				</tr>
			</table>
		</div>
		<!-- Fim Pagamento -->
		<br>
		<input type="image" src="../img/check.png" name="finalizar orcamento" value="Finalizar Orçamento" width="85" height="auto" style="margin-bottom: -3.5px !important;">
		<a href=""><img src="../img/eraser.png" alt="Limpar Dados" width="75" height="auto"></a>
		<a href=""><img src="../img/printer.png" alt="Imprimir" width="75" height="auto"></a>
		<a href=""><img src="../img/obs.png" alt="Imprimir" width="75" height="auto"></a>

	</div>

</form>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
