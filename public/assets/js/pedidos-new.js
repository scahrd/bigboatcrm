$(document).ready(function(){
    getMenu();
});

function createMenu(p){
    var html= `
    <div class="col-lg-3" style="margin-top:5px;">
        <div class="card" style="width:100%;">
            <img class="card-img-top" style="max-height:145px;" src="${p.imagem}">
            <div class="card-body">
                <h5 class="card-title">${p.nome}</h5>
                <p class="card-text" style="text-align:left; font-size: 80%">
                    <h6>${p.descricao}</h6>
                    <h5></strong>R$ ${p.valor_unitario}</strong></h5>
                </p>
                <a id="item_${p.id}" data-id="${p.id}" class="fullwidth btn btn-info selecionarItem">Selecionar</a>
            </div>
        </div>
    </div>
    `;
    return html;
}

function getMenu(){
    $.ajax({
        dataType: "json",
        url: apiURL+'/menu',
        beforeSend: function (request) {
            request.setRequestHeader('ApiKey','ad78fabc48e94ea97cbace7191e78d3');
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
        url: apiURL+'/menu/'+idItem,
        beforeSend: function (request) {
            request.setRequestHeader('ApiKey','ad78fabc48e94ea97cbace7191e78d3');
        },
        success: function (data) {
            $('#loading-menu').hide();
            document.getElementById('menu-list').innerHTML = data.map(createMenu).join('\n');
        },
    });
}

$(document).on('click', '.selecionarItem', function(e){
    var item = $(this)
    $('#modalItemPedido').modal('show');
    var detalhes = getItem(item.data('id'));
})