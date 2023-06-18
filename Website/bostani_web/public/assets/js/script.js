// Set product name capitalize
$(".text-name").on("change keydown paste", function (e) {
    if ((this.value.length = 1)) {
    }
    var $this_val = $(this).val();
    $this_val = $this_val.toLowerCase().replace(/\b[a-z]/g, function (char) {
        return char.toUpperCase();
    });
    $(this).val($this_val);
});

// Ambil data sub kategori
$('select[name="category"]').on("change", function () {
    var kategoriID = $(this).val();
    if (kategoriID) {
        $.ajax({
            url: "/subkategori/get/" + kategoriID,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="sub_category"]').empty();
                $('select[name="sub_category"]').append(
                    '<option value=""></option>'
                );
                $.each(data, function (key, value) {
                    $('select[name="sub_category"]').append(
                        '<option value="' +
                            value["id"] +
                            '">' +
                            value["sub_category_name"] +
                            "</option>"
                    );
                });
            },
        });
    } else {
        $('select[name="sub_category"]').append(
            '<option value="">' + "</option>"
        );
    }
});

// Ambil data pelanggan
$(document).on("change", "#pelanggan", function () {
    var p_id = $(this).val();
    // console.log(p_id);

    $.ajax({
        type: "GET",
        url: "/pelanggan/get",
        data: {
            id: p_id,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data);

            // Set Nilai
            $("#no_telepon").val(data.customer_phone);
            $("#alamat").val(data.customer_address);
            $('#kota').val(data.city_name);
            $('#kecamatan').val(data.district_name);
            $('#kelurahan').val(data.urban_village_name);
        },
        error: function () {},
    });
});

// Ambil data produk
$(document).on("change", "#product_id", function () {
    var p_id = $(this).val();
    // console.log(p_id);

    $.ajax({
        type: "GET",
        url: "/produk/get",
        data: {
            id: p_id,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data);

            // Set Nilai
            $("#satuan").val(data[0].unit_name);
            $("#harga").val(data[0].product_selling_price);
        },
        error: function () {},
    });
});

// Ambil data kecamatan
$('select[name="kota"]').on("change", function () {
    var kotaID = $(this).val();
    if (kotaID) {
        $.ajax({
            url: "/kecamatan/get/" + kotaID,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="kecamatan"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="kecamatan"]').append(
                        '<option value="' +
                            value["id"] +
                            '">' +
                            value["district_name"] +
                            "</option>"
                    );
                });
            },
        });
    } else {
        $('select[name="kecamatan"]').empty();
    }
});

// Ambil data kelurahan
$('select[name="kecamatan"]').on("change", function () {
    var kecamatanID = $(this).val();
    if (kecamatanID) {
        $.ajax({
            url: "/kelurahan/get/" + kecamatanID,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="kelurahan"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="kelurahan"]').append(
                        '<option value="' +
                            value["id"] +
                            '">' +
                            value["urban_village_name"] +
                            "</option>"
                    );
                });
            },
        });
    } else {
        $('select[name="kelurahan"]').empty();
    }
});

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
            var row = document.getElementById("row-" + orderId);
            if (row) {
                row.style.display = "none";
            }
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
        $("#list_pengiriman").html(data);
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
            get_list_delivery_non_session();
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
