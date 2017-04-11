/**
 * Created by vsilvestre on 11/04/17.
 */

$(document).ready(function () {
    var element = $('#checkout');
    $.ajax({
        url: element.data('href')
    }).success(function (result) {
        $('div.total').html(result);
    }).fail(function (result) {
        console.log(result);
    });
});