/**
 * Created by vsilvestre on 11/04/17.
 */

$(document).ready(function () {
    $('a').click(function (e) {
        var element = $(e.target);
        if (element.attr('data-href')){
            e.preventDefault();
            var quantity = element.closest('div').find('input.item_quantity').attr('value');
            $.ajax({
                url: element.data('href'),
                data: 'quantity='+quantity
            }).success(function (result) {
                var panierCount = $('div.total');
                var qty = parseInt(panierCount.html()) + parseInt(quantity);
                panierCount.html(qty);
            }).fail(function (result) {
                console.log(result);
                alert('L\'ajout à échoué, assurez vous que la quantitée indiqué est supérieure ou égale à 1');
            });
        }
    });
});