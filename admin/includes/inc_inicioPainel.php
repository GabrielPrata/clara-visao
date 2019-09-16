<style type="text/css" media="screen">

@media screen and (min-width: 995px) {
  .container {
    margin-left: 250px !important;
  }

  .card-information {
    margin-left: 5% !important;
  }
}

</style>

<div class="container">
  <div class="section">

    <div class="row card-information">

      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-content cyan white-text">
            <p class="card-stats-title"><i class="mdi-action-assignment"></i> Novos orçamentos</p>
            <h4 class="card-stats-number"><?php print $orcamento; ?></h4>
          </p>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-content green white-text">
          <p class="card-stats-title"><i class="mdi-social-group-add"></i> Clientes cadastrados</p>
          <h4 class="card-stats-number"><?php print $totalClientes; ?></h4>
        </p>
      </div>
    </div>
  </div>

  <div class="col s12 m12 l3">
    <div class="card">
      <div class="card-content orange white-text">
        <p class="card-stats-title"><i class="mdi-action-credit-card"></i> Total de vendas mensais (30 dias)</p>
        <h4 class="card-stats-number"><?php print $totalVendas; ?></h4>
      </p>
    </div>
  </div>
</div>
</div>

</div>
</div>