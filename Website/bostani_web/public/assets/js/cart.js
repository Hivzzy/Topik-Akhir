function add_cart() {
    // $("#item_pesanan_form").on("submit", function (e) {
    // e.preventDefault();
    let product_id = $("#product_id").val();
    let unit = $("#satuan").val();
    let price = $("#harga").val();
    let quantity = $("#quantity").val();

    $.ajax({
        url: "/cart/add",
        type: "POST",
        data: {
            _token: token,
            product_id: product_id,
            unit: unit,
            price: price,
            quantity: quantity,
        },
        success: function (response) {
            // console.log(response);
            get_cart();
        },
        error: function (response) {
            console.error(response);
        },
    });
    // });
}

function get_cart() {
    $.ajax({
        url: "/cart/show",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        // console.log(data);
        $('#cart').html(data);
    });
}
