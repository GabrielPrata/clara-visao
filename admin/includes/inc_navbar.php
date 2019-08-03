<?php
$orc = mysqli_query($conn, "SELECT ID FROM ORCAMENTOS");
$orc = mysqli_num_rows($orc);

$cli = mysqli_query($conn, "SELECT ID FROM CLIENTES");
$cli = mysqli_num_rows($cli);
?>

<link rel="stylesheet" href="../css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css" media="screen,projection">
<link rel="stylesheet" href="css/navbar.css?version=1515" media="screen,projection">

<div class="navbar navbar-fixed">
  <nav>
    <div class="nav-wrapper color darken-2">
      <a href="#" data-target="sidenav-1" class="left sidenav-trigger hide-on-medium-and-up"><i class="material-icons">menu</i></a>
      <!-- Logo -->
      <a href="index.php" class="brand-logo left alinharlg"><img src="../img/logo.png" width="40" height="auto" alt="ClaraVisão"></a>

      <ul id="navbar-items" class="right alinhartx">
        <li><a href="../src/painel.php" class="fonte painelAdmin">Ir para Vendas</a></li>
        <li><a href="../src/valida.php?f=leave" class="fonte">Sair</a></li>
      </ul>
    </div>
  </nav>
</div>

<ul id="sidenav-1" class="sidenav sidenav-fixed">
  <li> <div class="client_view">
    <div class="fundo">
    </div> 
    <div class="info-client">
      <img src="../img/<?php print $admin['IMAGEM'];?>" class="circulo" width="75" height="auto">
    </div>
    <div class="info-txt">
      <h3><?php print $admin['NOME'];?></h3>
      <h4><?php print $admin['EMAIL'];?></h4>
    </div>
  </div> </li>

  <li><a href="index.php"><i class="material-icons lupa">pie_chart</i>Painel de Controle</a></li>
  <li><a href="funcionarios.php"><i class="material-icons lupa">account_circle</i>Funcionários</a></li>

  <li><a href="clientes.php"><i class="material-icons lupa">person</i>Clientes
    <span class="new badge green tooltipped" data-badge-caption="" data-position="right" data-tooltip="Total de Clientes"><?php print $cli; ?></span>
  </a></li>

  <li><a href="orcamentos.php"><i class="material-icons lupa">payment</i>Orçamentos 
    <span class="new badge blue tooltipped" data-badge-caption="" data-position="right" data-tooltip="Total de Orçamentos"><?php print $orc; ?></span>
  </a></li>
  
  <li><a class="dropdown-trigger fonte" data-target="dropdown-menu" href=""> <i class="material-icons lupa">add_circle</i>
    Cadastros 
    <i class="material-icons right">arrow_drop_down</i>
  </a></li>
  <li><a href="users.php"><i class="material-icons lupa">account_box</i>Usuários</a></li>
  <li><a href="sistema.php"><i class="material-icons lupa">settings</i>Definições do Sistema</a></li>
</ul>

<ul id="dropdown-menu" class="dropdown-content">
  <li><a href="cadastro.php?f=lab">Laboratório</a></li>
  <li><a href="cadastro.php?f=tipArmacao">Armação</a></li>
  <li><a href="cadastro.php?f=oftalmologista">Oftalmologista</a></li>
</ul>

<script src="../js/materialize.min.js"></script>
<script src="../js/nav.js"></script>
