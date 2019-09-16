// Função para atualizar o campo Código do Vendedor, completando ele automaticamente quando é trocado a campo da combobox, se não for trocado o campo ele seleciona o primeiro funcionario da lista
$(document).ready(function(){
    $("#telefone").mask("(00) 000000000");
    $("#telefone2").mask("(00) 000000000");
})

$(document).ready(function()
{
     $("#txtArmacaoPreco").maskMoney({
         decimal: ".",
         thousands: ""
     });

     $("#txtLentePreco").maskMoney({
        decimal: ".",
        thousands: ""
    });

    $("#txtDesconto").maskMoney({
        decimal: ".",
        thousands: ""
    });
});

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

    var total = armacaoF + lenteF;
    if (total >= desconto) { 
        total = total - desconto; 
    } else { 
        $('#txtDesconto').val("") 
    }

    $('#txtTotal').val((total).toLocaleString("pt-BR", { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
}