<style type="text/css" media="screen">

body {
  overflow-x: hidden;
}

@media screen and (min-width: 993px) {
  .logo {
    margin-left: 20% !important;
  }
}

</style>

<header id="header" class="page-topbar">
  <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color" style="background-color: #4CBCC8 !important;">
      <div class="nav-wrapper">
        <ul class="left"> 
          <li>
            <a href="index.php" class="brand-logo logo">
              <img src="../img/logo.png" alt="ClaraVisão" style="max-height: 50px !important; max-width: 50px !important; margin-top: -12.5px;">
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- end header nav-->
</header>

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">

    <!-- START LEFT SIDEBAR NAV-->
    <aside id="left-sidebar-nav">
      <ul id="slide-out" class="side-nav fixed leftside-navigation">

        <li class="user-details cyan darken-2">
          <div class="row">
            <div class="col col s4 m4 l4">
              <img src="images/usuarios/<?php print $admin['IMAGEM'] ?>" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col col s8 m8 l8">

              <ul id="profile-dropdown" class="dropdown-content">
                <li><a href="../src/valida.php?f=leave"><i class="mdi-hardware-keyboard-tab"></i> Sair</a>
                </li>
              </ul>

              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php print $admin['NOME']; ?></a>
              <p class="user-roal">Administrador</p>

            </div>
          </div>
        </li>

        <li class="bold"><a href="../src/painel.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Página de Orçamentos</a>
        </li>

        <?php $url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], 'admin/index.php')); ?>
        <?php if ($url != "admin/index.php") { ?>
        <li class="bold">
          <a href="index.php" class="waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Início</a>
        </li>
        <?php } else { ?>
        <li class="bold active">
          <a href="index.php" class="waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Início</a>
        </li>
        <?php } ?>

        <?php $url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], 'admin/index.php')); ?>
        <?php if ($url != "admin/index.php") { ?>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Relatórios</a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="#">Orçamentos</a>
                  </li>
                  <li>
                    <a href="#">Funcionarios</a>
                  </li>
                  <li>
                    <a href="#">Clientes</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <?php } else { ?>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-action-view-carousel"></i> Relatórios</a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="#">Orçamentos</a>
                  </li>
                  <li>
                    <a href="#">Funcionarios</a>
                  </li>
                  <li>
                    <a href="#">Clientes</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <?php } ?>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-group-add"></i> Cadastros </a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="cadastros.php?f=lab">Laboratório</a>
                  </li>
                  <li>
                    <a href="cadastros.php?f=arm">Armação</a>
                  </li>
                  <li>
                    <a href="cadastros.php?f=oft">Oftalmologista</a>
                  </li>
                  <li>
                    <a href="cadastros.php?f=cliente">Cliente</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Orçamentos </a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="#">Listar Orçamentos</a>
                  </li>
                  <li>
                    <a href="../src/painel.php">Cadastrar Orçamento</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> Usuários do Sistema</a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="#">Exibir usuários</a>
                  </li>
                  <li>
                    <a href="#">Cadastrar um usuário</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>

        <li class="li-hover"><div class="divider"></div></li>

        <li class="bold">
          <a href="#" class="waves-effect waves-cyan"><i class="mdi-action-settings"></i> Configurações</a>
        </li>

        <li class="bold">
          <a href="../src/valida.php?f=leave" class="waves-effect waves-cyan"><i class="mdi-hardware-keyboard-tab"></i> Sair</a>
        </li>

      </ul>
      <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-small waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
    </aside>

  </div>
  <!-- END WRAPPER -->

</div>