<?php
// Formulário que executa funções como salvar, editar e apagar orçamentos 
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

if (!isset($_GET['f'])) {
	print "<script>history.go(-1)</script>";
	exit();
}

include 'conn.php';

if ($_GET['f'] == "c") {
	$cliente = array(
		'txtNomeCliente' =>  mysqli_real_escape_string($conn, $_POST['txtNomeCliente']),
		'txtProfissao' =>  mysqli_real_escape_string($conn, $_POST['txtProfissao']), 
		'txtDataNascimento' =>  mysqli_real_escape_string($conn, $_POST['txtDataNascimento']), 
		'txtTelefone1' =>  mysqli_real_escape_string($conn, $_POST['txtTelefone1']), 
		'txtTelefone2' =>  mysqli_real_escape_string($conn, $_POST['txtTelefone2']), 
		'txtCidade' =>  mysqli_real_escape_string($conn, $_POST['txtCidade']), 
		'txtVendedorCod' =>  mysqli_real_escape_string($conn, $_POST['txtVendedorCod']), 
		'txtVendedor' =>  mysqli_real_escape_string($conn, $_POST['txtVendedor']), 
		'txtDataEmissao' =>  mysqli_real_escape_string($conn, $_POST['txtDataEmissao']), 
		'txtDataEntrega' =>  mysqli_real_escape_string($conn, $_POST['txtDataEntrega']), 
		'textOS' =>  mysqli_real_escape_string($conn, $_POST['textOS'])
	);
	$medidas = array(
		'txtLongeESF_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeESF_OD']),
		'txtLongeCIL_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeCIL_OD']), 
		'txtLongeEIXO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeEIXO_OD']), 
		'txtLongeADICAO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeADICAO_OD']), 
		'txtLongeDNP_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeDNP_OD']), 
		'txtLongeALTURA_OD' =>  mysqli_real_escape_string($conn, $_POST['txtLongeALTURA_OD']), 
		'txtLongeESF_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeESF_OE']), 
		'txtLongeCIL_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeCIL_OE']), 
		'txtLongeEIXO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeEIXO_OE']), 
		'txtLongeADICAO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeADICAO_OE']), 
		'txtLongeDNP_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeDNP_OE']), 
		'txtLongeALTURA_OE' =>  mysqli_real_escape_string($conn, $_POST['txtLongeALTURA_OE']), 
		'txtPertoESF_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoESF_OD']), 
		'txtPertoCIL_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoCIL_OD']), 
		'txtPertoEIXO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoEIXO_OD']), 
		'txtPertoADICAO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoADICAO_OD']), 
		'txtPertoDNP_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoDNP_OD']), 
		'txtPertoALTURA_OD' =>  mysqli_real_escape_string($conn, $_POST['txtPertoALTURA_OD']), 
		'txtPertoESF_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoESF_OE']), 
		'txtPertoCIL_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoCIL_OE']), 
		'txtPertoEIXO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoEIXO_OE']), 
		'txtPertoADICAO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoADICAO_OE']), 
		'txtPertoDNP_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoDNP_OE']), 
		'txtPertoALTURA_OE' =>  mysqli_real_escape_string($conn, $_POST['txtPertoALTURA_OE']),
		'txtMediaESF_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaESF_OD']), 
		'txtMediaCIL_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaCIL_OD']), 
		'txtMediaEIXO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaEIXO_OD']), 
		'txtMediaADICAO_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaADICAO_OD']), 
		'txtMediaDNP_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaDNP_OD']), 
		'txtMediaALTURA_OD' =>  mysqli_real_escape_string($conn, $_POST['txtMediaALTURA_OD']),
		'txtMediaESF_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaESF_OE']), 
		'txtMediaCIL_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaCIL_OE']), 
		'txtMediaEIXO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaEIXO_OE']), 
		'txtMediaADICAO_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaADICAO_OE']), 
		'txtMediaDNP_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaDNP_OE']), 
		'txtMediaALTURA_OE' =>  mysqli_real_escape_string($conn, $_POST['txtMediaALTURA_OE'])
	);
	$orcamento = array(
		'txtOftalmologista' =>  mysqli_real_escape_string($conn, $_POST['txtOftalmologista']),
		'txtArmacao' =>  mysqli_real_escape_string($conn, $_POST['txtArmacao']),
		'txtArmacaoReferencia' =>  mysqli_real_escape_string($conn, $_POST['txtArmacaoReferencia']),
		'txtCodLoja' =>  mysqli_real_escape_string($conn, $_POST['txtCodLoja']),
		'txtLente' =>  mysqli_real_escape_string($conn, $_POST['txtLente']),
		'txtObs' =>  mysqli_real_escape_string($conn, $_POST['txtObs']),
		'txtLaboratorio' =>  mysqli_real_escape_string($conn, $_POST['txtLaboratorio']),
		'txtArmacaoTipo' =>  mysqli_real_escape_string($conn, $_POST['txtArmacaoTipo']),
		'txtPonte' =>  mysqli_real_escape_string($conn, $_POST['txtPonte']),
		'txtDiag' =>  mysqli_real_escape_string($conn, $_POST['txtDiag']),
		'txtVertical' =>  mysqli_real_escape_string($conn, $_POST['txtVertical']),
		'txtArmacaoPreco' =>  mysqli_real_escape_string($conn, $_POST['txtArmacaoPreco']),
		'txtLentePreco' =>  mysqli_real_escape_string($conn, $_POST['txtLentePreco']),
		'txtDesconto' =>  mysqli_real_escape_string($conn, $_POST['txtDesconto']),
		'txtTotal' =>  mysqli_real_escape_string($conn, $_POST['txtTotal']),
		'txtFormaPag' =>  mysqli_real_escape_string($conn, $_POST['txtFormaPag']),
		'txtNumParcelas' =>  mysqli_real_escape_string($conn, $_POST['txtNumParcelas'])
	);

	//Verificar se o vendedor existe
	if ($cliente['txtVendedorCod'] != $cliente['txtVendedor']) {
		echo"<script language='javascript' type='text/javascript'>alert('O codigo do vendedor não coincide!'); history.go(-1)</script>";
		exit();
	}
	$sql = "SELECT * FROM FUNCIONARIOS WHERE CODIGO='" . $cliente['txtVendedorCod'] . "'";
	$query = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	$funcionario = mysqli_fetch_array($query);
	if ($count == 0) {
		echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao localizar o vendedor!'); history.go(-1)</script>";
		exit();
	}

	// Verificar se os campos obrigatórios foram preenchidos corretamente
	if ($cliente['txtNomeCliente'] == "" || $cliente['txtDataNascimento'] == "" || $cliente['txtTelefone1'] == "" || $cliente['txtNomeCliente'] == " " || $cliente['txtDataNascimento'] == " " || $cliente['txtTelefone1'] == " ") {
		echo"<script language='javascript' type='text/javascript'>alert('Campos obrigatórios não preenchidos!'); history.go(-1)</script>";
		exit();
	}

	// Verificar se existe alguma chave da array Medidas gravada como vazia e substitui-la por NULL
	foreach ($medidas as $key => $value) {
		if (empty($value) || $value === null) {
			$medidas[$key] = "NULL";
		}
	}

	//inverter data de nascimento
	$dataNascimento = explode("-", $cliente['txtDataNascimento']);
	$dataNascimentoF = $dataNascimento[1];

	//Tratar nome do cliente 
	$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

	$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

	$txtNomeCliente = str_replace($comAcentos, $semAcentos, $cliente['txtNomeCliente']);
	$txtNomeCliente = strtoupper($txtNomeCliente);

	//Verificar se já existe esse cliente
	$sql = "SELECT * FROM CLIENTES WHERE CLIENTE='" . $txtNomeCliente . "' AND DATA_NASCIMENTO='" . $cliente['txtDataNascimento'] . "'";
	$query = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);

	//Verificar se o usuário não foi cadastrado, se não for cadastra-lo
	if ($count == 0) {

		//Verificar se o Numero de Telefone já foi cadastrado
		$sql = "SELECT * FROM CLIENTES WHERE (TELEFONE_1='" . $cliente['txtTelefone1'] . "') OR (TELEFONE_2='" . $cliente['txtTelefone1'] . "')";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('Telefone 1 já cadastrado!'); history.go(-1)</script>";
			exit();
		}

		$sql = "SELECT * FROM CLIENTES WHERE (TELEFONE_1='" . $cliente['txtTelefone2'] . "') OR (TELEFONE_2='" . $cliente['txtTelefone2'] . "')";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('Telefone 2 já cadastrado!'); history.go(-1)</script>";
			exit();
		}

		$sql = "INSERT INTO CLIENTES (CLIENTE, PROFISSAO, DATA_NASCIMENTO, TELEFONE_1, TELEFONE_2, CIDADE) VALUES ('$txtNomeCliente', '" . $cliente['txtProfissao'] . "', '" . $cliente['txtDataNascimento'] . "', '" . $cliente['txtTelefone1'] . "', '" . $cliente['txtTelefone2'] . "', '" . $cliente['txtCidade'] . "')";

		if (!mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Erro ao cadastrar o cliente. Contate um administrador do sistema!'); history.go(-1)</script>";
			exit();
		} 
		//Finaliza cadastro de cliente
	}

	// Buscar ID do usuário cadastrado
	$sql = "SELECT * FROM CLIENTES WHERE CLIENTE='" . $txtNomeCliente . "' AND DATA_NASCIMENTO='" . $cliente['txtDataNascimento'] . "'";
	$query = mysqli_query($conn, $sql);
	$clienteInfo = mysqli_fetch_array($query);

	// Preparar para cadastrar as medidas

	$sql = "INSERT INTO MEDIDAS ";
	$sql = $sql . " (LONGE_OD_ESF, LONGE_OD_CIL, LONGE_OD_EIXO, LONGE_OD_ADICAO, LONGE_OD_DNP, LNGE_OD_ALTURA, LONGE_OE_ESF, LONGE_OE_CIL, LONGE_OE_EIXO, LONGE_OE_ADICAO, LONGE_OE_DNP, LONGE_OE_ALTURA, ";
	$sql = $sql . " PERTO_OD_ESF, PERTO_OD_CIL, PERTO_OD_EIXO, PERTO_OD_ADICAO, PERTO_OD_DNP, PERTO_OD_ALTURA, PERTO_OE_ESF, PERTO_OE_CIL, PERTO_OE_EIXO, PERTO_OE_ADICAO, PERTO_OE_DNP, PERTO_OE_ALTURA, ";
	$sql = $sql . " MEDIA_OD_ESF, MEDIA_OD_CIL, MEDIA_OD_EIXO, MEDIA_OD_ADICAO, MEDIA_OD_DNP, MEDIA_OD_ALTURA, MEDIA_OE_ESF, MEDIA_OE_CIL, MEDIA_OE_EIXO, MEDIA_OE_ADICAO, MEDIA_OE_DNP, MEDIA_OE_ALTURA, CLIENTE) ";
	$sql = $sql . " VALUES ";
	$sql = $sql . " ('" . $medidas['txtLongeESF_OD'] . "', '" . $medidas['txtLongeCIL_OD'] . "', '" . $medidas['txtLongeEIXO_OD'] . "', '" . $medidas['txtLongeADICAO_OD'] . "', '" . $medidas['txtLongeDNP_OD'] . "', '" . $medidas['txtLongeALTURA_OD'] . "', '" . $medidas['txtLongeESF_OE'] . "', '" . $medidas['txtLongeCIL_OE'] . "', '" . $medidas['txtLongeEIXO_OE'] . "', '" . $medidas['txtLongeADICAO_OE'] . "', '" . $medidas['txtLongeDNP_OE'] . "', '" . $medidas['txtLongeALTURA_OE'] . "', ";
	$sql = $sql . " '" . $medidas['txtPertoESF_OD'] . "', '" . $medidas['txtPertoCIL_OD'] . "', '" . $medidas['txtPertoEIXO_OD'] . "', '" . $medidas['txtPertoADICAO_OD'] . "', '" . $medidas['txtPertoDNP_OD'] . "', '" . $medidas['txtPertoALTURA_OD'] . "', '" . $medidas['txtPertoESF_OE'] . "', '" . $medidas['txtPertoCIL_OE'] . "', '" . $medidas['txtPertoEIXO_OE'] . "', '" . $medidas['txtPertoADICAO_OE'] . "', '" . $medidas['txtPertoDNP_OE'] . "', '" . $medidas['txtPertoALTURA_OE'] . "', ";
	$sql = $sql . " '" . $medidas['txtMediaESF_OD'] . "', '" . $medidas['txtMediaCIL_OD'] . "', '" . $medidas['txtMediaEIXO_OD'] . "', '" . $medidas['txtMediaADICAO_OD'] . "', '" . $medidas['txtMediaDNP_OD'] . "', '" . $medidas['txtMediaALTURA_OD'] . "', '" . $medidas['txtMediaESF_OE'] . "', '" . $medidas['txtMediaCIL_OE'] . "', '" . $medidas['txtMediaEIXO_OE'] . "', '" . $medidas['txtMediaADICAO_OE'] . "', '" . $medidas['txtMediaDNP_OE'] . "', '" . $medidas['txtMediaALTURA_OE'] . "', ";
	$sql = $sql . " '" . $clienteInfo['ID'] . "' ) ";

	if (!mysqli_query($conn, $sql)) {
		mysqli_free_result($clienteInfo);
		mysqli_close($conn);
		print "<script>alert('Erro ao cadastrar as medidas. Contate um administrador do sistema!'); history.go(-1)</script>";
		exit();
	} 
	// Capturar o ID que as medidas foram salvas
	$medidasID = mysqli_insert_id($conn);

	// Preparar para cadastrar o orçamento
	$sql = "INSERT INTO ORCAMENTOS (CLIENTE, VENDEDOR_ID, DATA_CRIACAO, DATA_ENTREGA, OS, MEDIDAS, OFTALMOLOGISTA, ARMACAO, ARMACAO_REFERENCIA, ARMACAO_PRECO, ARMACAO_TIPO, LENTE, LENTE_PRECO, OBSERVACAO, LABORATORIO, PONTE_ARO, DIAG_MAIOR, VERTICAL, DESCONTO, TOTAL, FORMA_PAG, NUM_PARCELAS) ";
	$sql = $sql . " VALUES ";
	$sql = $sql . " ('" . $clienteInfo['ID'] . "', '" . $funcionario['ID'] . "', '" . $cliente['txtDataEmissao'] . "', '" . $cliente['txtDataEntrega'] . "', '" . $cliente['textOS'] . "', '" . $medidasID . "', '" . $orcamento['txtOftalmologista'] . "', '" . $orcamento['txtArmacao'] . "', '" . $orcamento['txtArmacaoReferencia'] . "', '" . $orcamento['txtArmacaoPreco'] . "', '" . $orcamento['txtArmacaoTipo'] . "', '" . $orcamento['txtLente'] . "', '" . $orcamento['txtLentePreco'] . "', '" . $orcamento['txtObs'] . "', '" . $orcamento['txtLaboratorio'] . "', '" . $orcamento['txtPonte'] . "', '" . $orcamento['txtDiag'] . "', '" . $orcamento['txtVertical'] . "', '" . $orcamento['txtDesconto'] . "', '" . $orcamento['txtTotal'] . "', '" . $orcamento['txtFormaPag'] . "', '" . $orcamento['txtNumParcelas'] . "')";

	if (!mysqli_query($conn, $sql)) {
		mysqli_free_result($clienteInfo);
		mysqli_close($conn);
		print "<script>alert('Erro ao cadastrar as medidas. Contate um administrador do sistema!'); history.go(-1)</script>";
		exit();
	} 

	mysqli_free_result($clienteInfo);
	mysqli_close($conn);
	echo"<script language='javascript' type='text/javascript'>alert('Orçamento criado com sucesso!');window.location.href='painel.php';</script>";
	exit();
}

?>