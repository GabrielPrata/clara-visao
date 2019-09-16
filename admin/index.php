<?php 

$dia = date('Y-m-d');

// Painel do admin
if (!isset($_SESSION)) {
  SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
  header("Location:../index.php");
}

// Verifica se o Usuário é admin
if ($_SESSION['admin'] == 0) {
  header("Location:../index.php");
}

include '../src/conn.php';

//Adicionando informações do admin na página
$sql = "SELECT * FROM USUARIOS WHERE ID = '" .$_SESSION['admin_id']. "'";
$admin = mysqli_query($conn, $sql);
$admin = mysqli_fetch_array($admin);

//Query para coletar os orçamentos realizados no dia
$sql = "SELECT ID FROM ORCAMENTOS WHERE DATA_CRIACAO = '$dia'";
$rs = mysqli_query($conn, $sql);
$orcamento = mysqli_num_rows($rs);

//Query para coletar o total de clientes 
$query = mysqli_query($conn, "SELECT * FROM CLIENTES");
$totalClientes = mysqli_num_rows($query);

//Query para coletar os orçamentos criados em 1 mês de 30 dias
$query = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE DATA_CRIACAO BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE()");
$totalVendas = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>ClaraVisão | Administrativo</title>

  <!-- Favicons-->
  <link rel="icon" href="../favicon.png" sizes="32x32">

  <!-- CORE CSS-->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
    <div id="loader"></div>        
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <?php include 'includes/inc_navbar.php'; ?>
  <?php include 'includes/inc_inicioPainel.php'; ?>

  <!-- Scripts Js -->

  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
  <script type="text/javascript" src="js/materialize.js"></script>
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/custom-script.js"></script>

</body>
</html>

<?php 

mysqli_free_result($admin);
mysqli_close($conn);
?>