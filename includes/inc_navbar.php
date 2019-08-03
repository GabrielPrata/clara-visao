<link rel="stylesheet" href="../css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css?version=124345" media="screen,projection">

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper color darken-2">
      <!-- Logo -->
      <a href="painel.php" class="brand-logo alinhar-logo"><img src="../img/logo.png" width="40" height="auto" alt="ClaraVisão"></a>

      <!-- Ícone para abrir no Mobile -->
      <a href="#" data-target="mobile-navbar" class="sidenav-trigger">
        <i class="material-icons">menu</i>
      </a>

      <ul id="navbar-items" class="right hide-on-med-and-down alinhar-texto">
        <?php if ($_SESSION['admin'] == 1) { ?>
        <li><a href="../admin/index.php" class="fonte painelAdmin">Painel</a></li>
        <?php } ?>
        <li><a href="painel.php" class="fonte">Início</a></li>
        <li><a href="pesquisar.php" class="fonte">Pesquisar</a></li>
        <li>
          <a class="dropdown-trigger fonte" data-target="dropdown-menu" href="">
            Cadastros <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
        <li><a href="valida.php?f=leave" class="fonte">Sair</a></li>
      </ul>

      <!-- Dropdown -->
      <ul id="dropdown-menu" class="dropdown-content">
        <li><a href="cadastro.php?f=cliente">Cliente</a></li>
        <li><a href="cadastro.php?f=lab">Laboratório</a></li>
        <li><a href="cadastro.php?f=tipArmacao">Armação</a></li>
        <li><a href="cadastro.php?f=oftalmologista">Oftalmolo...</a></li>
      </ul>
    </div>
  </nav>
</div>

<!-- Menu Mobile -->
<ul id="mobile-navbar" class="sidenav">
  <?php if ($_SESSION['admin'] == 1) { ?>
  <li><a href="../admin/index.php" class="admin">Painel do Admin.</a></li>
  <?php } ?>
  <li><a href="painel.php">Início</a></li>
  <li><a href="pesquisar.php">Pesquisar</a></li>
  <li><a href="cadastro.php?f=lab">Cadastrar Laboratório</a></li>
  <li><a href="cadastro.php?f=tipArmacao">Cadastrar Tipo de Armação</a></li>
  <li><a href="cadastro.php?f=cliente">Cadastrar Cliente</a></li>
  <li><a href="cadastro.php?f=oftalmologista">Cadastrar Oftalmologista</a></li>
  <li><a href="valida.php?f=leave">Sair</a></li>
</ul>

<script src="../js/materialize.min.js"></script>
<script src="../js/nav.js"></script>
