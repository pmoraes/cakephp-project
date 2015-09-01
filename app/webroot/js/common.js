var itens = 0;
var total = 0

//WISHLIST
$(document).ready(function() {
    masks();

    $('.btn-wishlist').on('click', function() {
        var id = $(this).data('id');
        var type = $(this).data('button');
        
        if (type == "wishlist") {
            $('#title').html('Lista de Desejo');
            $.ajax({
                url: baseUrl + 'clients/addWishList/' + id,
                type: 'GET',
                success: function (data) {
                    $('#content-error').hide();
                    $('#content-success').show();
                    $('#content-success').html('Produto inserido na sua lista de desejo!');
                    $('#alert').modal('show');
                },error: function (error) {
                    $('#content-success').hide();
                    $('#content-error').shows();
                    if (error.status == 404) {
                        $('#content-error').html('Produto não foi encontrado. Tente Novamente!');
                    } else if (error.status == 500) {
                        $('#content-error').html('Ocorreu um erro interno! Tente Novamente!');
                    } else if (error.status == 403) {
                        $('#content-error').html('Você precisa estar logado para colocar o produto na sua lista de desejo!');              
                    }
                    $('#alert').modal('show');
                }
            });
        } else if (type == 'cart') {
            $('#title').html('Carrinho de Compras');
            $.ajax({
                url: baseUrl + 'clients/addCart/' + id,
                type: 'GET',
                success: function (data) {
                    if (typeof(data) === "string") {
                        data = JSON.parse(data);
                    }
                    $('#content-error').hide();
                    $('#content-success').show();
                    addCart(data);
                    $('#content-success').html('Produto inserido no seu carrinho de compras!');
                    $('#alert').modal('show');
                },error: function (error) {
                    $('#content-success').hide();
                    $('#content-error').show();
                    if (error.status == 404) {
                        $('#content-error').html('Produto não foi encontrado. Tente Novamente!');
                    } else if (error.status == 500) {
                        $('#content-error').html('Ocorreu um erro interno! Tente Novamente!');
                    }
                    $('#alert').modal('show');
                }
            });
        }
    });
});

function masks() {
    $('#SellCep').mask("99999-999");
    $('#ClientCep').mask("99999-999");
    $('#ClientFirstContact').mask("(99) 9999-9999");
    $('#ClientLastContact').mask("(99) 9999-9999");
}

function addCart(data) {
    $('#'+ data.Product.id).remove();
    var record = newRecordCart(data, data.length);
    
    $("#products").append(record);
    
    var items = $('#item').html();
    items = parseInt(items) + 1;
    $('#item').html(items);

    var totalItems = $('#totalItem').html();
    totalItems = formatNumber(parseInt(totalItems) + parseFloat(data.Product.price));
    
    $('#totalItem').html(totalItems);

    var subTotal = $("#total").html();

    total = (parseFloat(subTotal) + parseFloat(data.Product.price));
    
    $("#subtotal").html(formatNumber(total));
    $("#total").html(formatNumber(total))
}

function newRecordCart(data, length) {
    var record = "";
    record += "<tr id=" + data.Product.id + ">";
    record += "<td class='text-left'>";
    record += "<a href='/produtos/" + data.SubCategory.slug + "/" + data.Product.slug + "'>";
    record += data.Product.name;
    record += "</a>";
    record += "</td>";
    record += "<td class='text-right'>x" + length + "</td>";
    record += "<td class='text-right'>R$ " + formatNumber(data.Product.price) + "</td>";
    record += "<td class='text-center'>";
    record += "</td>";
    record += "</tr>";

    return record;
}

function formatNumber(number)
{   
    number = parseFloat(number);
    return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}