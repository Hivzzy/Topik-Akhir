function add_pesanan(button) {
    // let order_id = $("#order_id").val();
    var orderIdInput = button.parentNode.parentNode;
    var orderId = orderIdInput.getAttribute("order_id");

    console.log(orderId);
    $.ajax({
        url: "/pengiriman/list/add_pesanan",
        type: "POST",
        data: {
            _token: token,
            order_id: orderId,
        },
        success: function (response) {
            // var row = document.getElementById("row-" + orderId);
            // if (row) {
            //     row.style.display = "none";
            // }
            get_list_delivery();
        },
        error: function (response) {
            // console.log(response);
            // alert(response.responseJSON.message);
            swal("Oops!", "" + response.responseJSON.message + "", "error");
        },
    });
}

function get_list_delivery() {
    $.ajax({
        url: "/pengiriman/list",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        $("#list_pesanan").html(data);
    });
}

function get_list_delivery_non_session() {
    $.ajax({
        url: "/pengiriman/data",
        method: "GET",
        contentType: "application/json",
    }).done(function (data) {
        // $("#list_pengiriman").html(data);
        console.log(data);
    });
}

function delete_all_list() {
    $.ajax({
        url: "/pengiriman/list/list_delete",
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            // console.log(response);
            swal("Success!", "" + response.message + "", "success");
            get_list_delivery();
        },
        error: function (response) {
            // console.log(response);
            // alert(response.responseJSON.message);
            swal("Oops!", "" + response.responseJSON.message + "", "error");
        },
    });
    // .done(function (data) {
    //     get_cart();
    // });
}
