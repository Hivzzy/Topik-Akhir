function add_cart() {
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
            document.getElementById("item_pesanan_form").reset();
            get_cart();
        },
        error: function (response) {
            console.error(response);
        },
    });
}

function get_cart() {
    $.ajax({
        url: "/cart/show",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        // console.log(data);
        $("#cart").html(data);
    });
}

function delete_all_cart() {
    $.ajax({
        url: "/cart/delete/",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        get_cart();
    });
}
