<link rel="stylesheet" href="../css/orcamentos.css?version=124" media="screen,projection">

<!-- envia o formulario para a página orcamento.php, passando o valor c por get. c = cadastro de novo orçamento -->
<div class="container center">
	<form action="orcamento.php?f=c" method="POST" accept-charset="utf-8">

		<h4 class="titulo-form">Orçamento <span class="titulo-form-span">nº<?php print $orcamento; ?></span></h4>

		<div class="cliente">
			<table>
				<caption class="titulo-grupo">Cliente</caption>
				<tr>
					<td>
						<label class="descricao">Nome Completo<span class="obrigatorio"> *</span>
							<input class="caixaGrande" type="text" name="txtNomeCliente" required>
							<a href="#" class="caixaPesquisa"><i class="material-icons lupa">search</i></a>
						</label> 
					</td>
				</tr>
			</table>

			<table>

				<tr>
					<td>
						<label class="descricao alinhar">Profissão
							<input class="caixa" type="text" name="txtProfissao">
						</label>
					</td>
					<td>
						<label class="descricao">Data de Nascimento<span class="obrigatorio">*</span>
							<input class="caixa" type="date" name="DataNascimento" required>
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Telefone 1<span class="obrigatorio"> *</span>
							<input class="caixa" type="text" name="txtTelefone1" required>
						</label>
					</td>
					<td>
						<label class="descricao">Telefone 2
							<input class="caixa" type="text" name="txtTelefone2">
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Cidade
							<input class="caixa" type="text" name="txtCidade" value="Descalvado">
						</label>
					</td>
					<td>
						<label class="descricao">Vendedor
							<input class="caixa" type="text" name="txtVendedor" size="8">
						</label>
					</td>
					<td>
						<input class="caixa" type="text" name="txtVendedorCod" size="3">
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Data
							<input class="caixa" type="date" name="DataEmissao" value="<?php echo date('Y-m-d'); ?>">
						</label>
					</td>
					<td>
						<label class="descricao">Data da Entrega
							<input class="caixa" type="date" name="DataEntrega" value="<?php echo date('Y-m-d', strtotime(' +12 days ')); ?>">
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label class="descricao alinhar">Imagem
							<input class="caixa" type="image" name="Imagem">
						</label>
					</td>
					<td>
						<label class="descricao">O.S
							<input class="caixa" type="text" name="textOS" size="3">
						</label>
					</td>
				</tr>
			</table>

			<table>
				<caption class="titulo-grupo">Dioptrias e Medidas</caption>
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
				<table>
					<td>
						<tr>
							<label class="descricao">Oftalmologista
								<input class="caixaGrande" type="text" name="txtOftalmologista" required="">
								<a href="#" class="caixaPesquisa"><i class="material-icons lupa">search</i></a>
							</label>
						</tr>
					</td>
				</table>
			</table>

			<table>
				<caption class="titulo-grupo">Descrição de Lentes e Armação</caption>
				<tr>
					<td>
						<label class="descricao">Armação
							<input class="caixa" type="text" name="txtArmacao">
						</label>
					</td>
					<td>
						<label class="descricao">Referencia
							<input class="caixa" type="text" name="txtArmacaoReferencia">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label class="descricao">Lente
							<input class="caixa" type="text" name="txtLente">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label class="descricao">Observação
							<textarea name=""></textarea>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label class="descricao">Laboratório
							<input class="caixaGrande" type="text" name="txtLaboratorio">
							<a href="#" class="caixaPesquisa"><i class="material-icons lupa">search</i></a>
						</label>
					</td>
					<td>
						<label class="descricao">Tipo de Armação
							<input class="caixa" type="text" name="txtArmacaoTipo">
						</label>
					</td>
				</tr>
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
						<label class="descricao">Forma de Pagamento
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

			<input type="submit" name="finalizar orcamento" value="Finalizar Orçamento" class="finalizar"> <br> <br>
			<input type="reset" name="limpar dados" value="Limpar Dados" class="limpar"> 
			&nbsp; &nbsp; &nbsp; &nbsp;
			<input type="button" name="imprimir" value="Imprimir" class="imprimir"> <br> <br>
			<a href="#" class="observacao">Abrir Observação</a>

		</div>

	</form>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
