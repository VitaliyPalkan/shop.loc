
function shawCategory(view) {
    $('#column-left').html(view);
}



function clearCart(id) {
    $.ajax({
        url: '/shop/catalog/leftcategory',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) alert("Ошибка!");
            shawCategory(res);
        },
        error: function () {
            alert("Error");
        }
    });
    return false;
}

