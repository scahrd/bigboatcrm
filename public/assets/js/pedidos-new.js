/**FUNCTIONS */

function createMenuItem(p){
    return html= `
    <input type="text" id="tituloItem_${p.id}" value="${p.nome}" hidden>
    <input type="number" id="idItem" value="${p.id}" hidden>
    <input type="number" id="quantidadeItem_${p.id}" value="1" hidden>
    <input type="number" id="valorItem_${p.id}" value="${p.valor_unitario}" hidden>
    <input type="number" id="valorBase_${p.id}" value="${p.valor_unitario}" hidden>
    <center><h4>${p.nome}</h4></center>
    <div class="jumbotron" style="padding: 2rem 1rem !important">
        <div class="row">
            <div class="col-md-4">
                <img class="img img-thumbnail" src="${p.imagem}">
            </div>
            <div class="col-md-6">
                <b>Descrição:</b>
                <br><span>${p.descricao}</span>
                <br><b>Composição:</b>
                <br><span>${p.composicao}</span>
                <br><b>Observação:</b>
                <br><span>${p.observacao}</span>
            </div>
            <div class="col-md-2" style="padding-top:50px; text-align: center">
                <i class="fas fa-minus-circle alteraQuantidadeItem" data-id="${p.id}" id="quantidadeMenos" style="color:#bb3434; font-size: 22px; float: left; cursor:pointer"></i> 
                <span id="indicadorQuantidade_${p.id}">1</span> 
                <i class="fas fa-plus-circle alteraQuantidadeItem" data-id="${p.id}" id="quantidadeMais" style="color:#4a844a; font-size: 22px; float: right; cursor:pointer"></i>
                <br><br>
                <h5 id="indicadorValor_${p.id}">R$ ${p.valor_unitario}</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <b>Observações e Trocas:</b>
                <textarea class="textarea" rows="5"></textarea>
                
            </div>
        </div>
    </div>
    `;
}

function createMenu(p){
    return html= `
    <div class="col-lg-3" style="margin-top:5px;">
        <div class="card" style="width:100%;">
            <img class="card-img-top img img-thumbnail" style="height:145px; border:none !important;" src="${p.imagem}">
            <div class="card-body">
                <h5 class="card-title">${p.nome}</h5>
                <p class="card-text" style="text-align:left; font-size: 80%">
                    <h6>${p.descricao}</h6>
                    <h5></strong>R$ ${p.valor_unitario}</strong></h5>
                </p>
                <a id="item_${p.id}" data-id="${p.id}" class="fullwidth btn btn-info selecionarItem">Adicionar</a>
            </div>
        </div>
    </div>
    `;
}

function getMenu(){
    $.ajax({
        dataType: "json",
        url: apiURL+'/menu',
        beforeSend: function (request) {
            request.setRequestHeader('ApiKey',apiToken);
        },
        success: function (data) {
            $('#loading-menu').hide();
            document.getElementById('menu-list').innerHTML = data.map(createMenu).join('\n');
        },
    });
}

function getItem(idItem){
    $.ajax({
        dataType: "json",
        method:"GET",
        url: apiURL+'/menu/'+idItem,
        beforeSend: function (request) {
            request.setRequestHeader('ApiKey',apiToken);
        },
        success: function (data) {
            $('#loading-menuItem').hide();
            if (data.composto == '1') {
                data['composicao'] = concatComposicao(data.composicao);  
            }else{
                data['composicao'] = '';
            }
            document.getElementById('itemPedido').innerHTML = createMenuItem(data);
        },
    });
}

function concatComposicao(c){
    var string = '';
    var i = 0;
    c.forEach(e => {
        if (i>0) { string = string+', '+e.quantidade+' '+e.nome; }else{ string = e.quantidade+' '+e.nome; }
        i++;
    });
    return(string);
}

function alteraQuantidade(itemId, operacao){
    var operacao = (operacao===undefined ? 'plus' : operacao);
    var quantidade = parseFloat($('#quantidadeItem_'+itemId).val());
    var valorItem = parseFloat($('#valorItem_'+itemId).val());
    var valorBase = parseFloat($('#valorBase_'+itemId).val());

    if (operacao == 'plus') {
        quantidade = quantidade+1;
    } else {
        if(quantidade > 1){
            quantidade = quantidade-1;
        }
    }
    valorItem = valorBase*quantidade;

    $('#quantidadeItem_'+itemId).val(quantidade);
    $('#indicadorQuantidade_'+itemId).text(quantidade);
    
    $('#valorItem_'+itemId).val(valorItem.toFixed(2));
    $('#indicadorValor_'+itemId).text('R$ '+ valorItem.toFixed(2));    
}

/**ACTIONS */

$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    getMenu();
});

$(document).on('click', '.selecionarItem', function(e){
    var item = $(this);
    $('#modalItemPedido').modal('show');
    var detalhes = getItem(item.data('id'));
});

$(document).on('click', '.alteraQuantidadeItem', function(e){
    var btn = $(this);
    if (btn.attr('id') == 'quantidadeMais') {
        alteraQuantidade(btn.data('id'));
    } else {
        alteraQuantidade(btn.data('id'), 'less');
    }
});

$('#modalItemPedido').on('hide.bs.modal', function () {
    document.getElementById('itemPedido').innerHTML = '';
    $('#loading-menuItem').show();
});

$(document).on('click', '#adicionarPedido', function(e){
    var itemId = $('#idItem').val();
    var item = {'id':itemId, 'nome':$('#tituloItem_'+itemId).val(), 'quantidade':$('#quantidadeItem_'+itemId).val(), 'valor':$('#valorItem_'+itemId).val()};
    $('#tableItens').append(addItem(item));
    $('#modalItemPedido').modal('hide');
});

$(document).on('click', '.removerItem', function(e){
    removeItem($(this));
});

function removeItem(linha){
    var itemId = linha.data('id');
    var valor = 0;
    $('#quantidadeCarrinho').text(parseInt($('#quantidadeCarrinho').text())-1);
    carrinho = parseFloat($('#valorCarrinho').text());
    item = parseFloat($('#valorItemCarrinho_'+itemId).val());
    $('#item_'+itemId).text('Adicionar').addClass('selecionarItem').addClass('btn-info');
    if((carrinho - item) > 0){
        $('#valorCarrinho').text((carrinho - item).toFixed(2));
    }else{
        $('#valorCarrinho').text('0.00');
    }
    $('#linhaItem_'+itemId).remove();
}

function addItem(item){
    $('#quantidadeCarrinho').text(parseInt($('#quantidadeCarrinho').text())+1);
    carrinho = parseFloat($('#valorCarrinho').text());
    itemCarrinho = parseFloat(item.valor);
    $('#valorCarrinho').text((carrinho + itemCarrinho).toFixed(2));
    $('#item_'+item.id).text('Adicionado').removeClass('selecionarItem').removeClass('btn-info');
    return `
    <tr id="linhaItem_${item.id}">
        <th style=" text-align:center" scope="row">${item.quantidade}</th>
        <td style=" text-align:left">${item.nome}</td>
        <td style=" text-align:center">R$ ${item.valor} <input id="valorItemCarrinho_${item.id}" value="${item.valor}" hidden></td>
        <td style=" text-align:center"><a href='#' style="color:red" data-id="${item.id}" class="removerItem far fa-trash-alt"></a></td>
    </tr>
    `;
}