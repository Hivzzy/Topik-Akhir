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
            document.getElementById("item_pesanan_form").reset();
            get_cart();
        },
        error: function (response) {
            // console.log(response);
            // alert(response.responseJSON.message);
            swal("Oops!", ""+response.responseJSON.message+"", "error");
        },
    });
}

function get_cart() {
    $.ajax({
        url: "/cart/show",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        $("#cart").html(data);
    });
}

function delete_all_cart() {
    $.ajax({
        url: "/cart/delete/",
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            // console.log(response);
            swal("Success!", ""+response.message+"", "success");
            get_cart();
        },
        error: function (response) {
            // console.log(response);
            // alert(response.responseJSON.message);
            swal("Oops!", ""+response.responseJSON.message+"", "error");
        },
    });
    // .done(function (data) {
    //     get_cart();
    // });
}
