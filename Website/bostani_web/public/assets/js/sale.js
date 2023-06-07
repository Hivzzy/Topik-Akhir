$("#jenisLaporan")
    .on("change", function () {
        $(".data").hide();
        $("#" + $(this).val()).fadeIn(0);
    })
    .change();

$("#getDate").click(function () {
    var tanggal = $("#tanggal_penjualan").val();
    if (tanggal === "") {
        tanggal = new Date().toISOString().slice(0, 10);
    }

    getPenjualanHarian(tanggal);
});

$("#getMonth").click(function () {
    var tanggal = $("#bulan_penjualan").val();
    if (tanggal === "") {
        tanggal = new Date().toISOString().slice(0, 10);
    }
    getPenjualanBulanan(tanggal);
});

$("#getDateRange").click(function () {
    var tanggal_awal = $("#tanggal_awal").val();
    var tanggal_akhir = $("#tanggal_akhir").val();

    if (tanggal_awal === "") {
        tanggal_awal = new Date().toISOString().slice(0, 10);
    }

    if (tanggal_akhir === "") {
        tanggal_akhir = new Date().toISOString().slice(0, 10);
    }

    getPenjualanPeriode(tanggal_awal, tanggal_akhir);
});

function getPenjualanHarian(tanggal) {
    $.ajax({
        url: "/penjualan/harian/" + tanggal,
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            $("#daily_sale").html(response);
            // console.log(response);
        },
        error: function (response) {
            console.log(response.responseJSON.message);
        },
    });
}

function getPenjualanBulanan(tanggal) {
    $.ajax({
        url: "/penjualan/bulanan/" + tanggal,
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            $("#month_sale").html(response);
            // console.log(response);
        },
        error: function (response) {
            console.log(response.responseJSON.message);
        },
    });
}

function getPenjualanPeriode(tanggal_awal, tanggal_akhir) {
    $.ajax({
        url: "/penjualan/periode/" + tanggal_awal + "/" + tanggal_akhir,
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            $("#periode_sale").html(response);
            // console.log(response);
        },
        error: function (response) {
            console.log(response.responseJSON.message);
        },
    });
}

$("#btn-daily-pdf").click(function () {
    var tanggal = $("#tanggal_penjualan").val();
    if (tanggal === "") {
        tanggal = new Date().toISOString().slice(0, 10);
    }
    window.location.href = "/laporan/harian/rekap/" + tanggal + "";
});
