function getChart() {
    $.ajax({
        url: "/penjualan/data",
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            // useReturnData(response);
            getWilayahPenjualan(response.wilayah);
            getProdukSatuanBongkol(response.produk_bongkol);
            getProdukSatuanBungkus(response.produk_bungkus);
            getProdukSatuanButir(response.produk_butir);
            getProdukSatuanIkat(response.produk_ikat);
            getProdukSatuanKg(response.produk_kg);
            getProdukSatuanPack(response.produk_pack);
            getProdukSatuanPaket(response.produk_paket);
            getProdukSatuanPasang(response.produk_pasang);
            getProdukSatuanTray(response.produk_tray);
        },
    });
}

function useReturnData(data) {
    data_penjualan = data;
    // console.log(data_penjualan);
}

function getWilayahPenjualan(data) {
    const c_region = document.getElementById("region_chart");
    new Chart(c_region, {
        type: "bar",
        data: {
            labels: data.map((row) => row.kelurahan),

            datasets: [
                {
                    label: "Wilayah Penjualan 30 Hari Terakhir",
                    data: data.map((row) => row.jumlah_pesanan),
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

function getProdukSatuanKg(data) {
    const chart = document.getElementById("produk_kg");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanBungkus(data) {
    const chart = document.getElementById("produk_bungkus");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanBongkol(data) {
    const chart = document.getElementById("produk_bongkol");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanTray(data) {
    const chart = document.getElementById("produk_tray");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanIkat(data) {
    const chart = document.getElementById("produk_ikat");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanButir(data) {
    const chart = document.getElementById("produk_butir");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanPack(data) {
    const chart = document.getElementById("produk_pack");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanPaket(data) {
    const chart = document.getElementById("produk_paket");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}

function getProdukSatuanPasang(data) {
    const chart = document.getElementById("produk_pasang");
    new Chart(chart, {
        type: "pie",
        data: {
            labels: data.map((row) => row.nama_item),
            datasets: [
                {
                    data: data.map((row) => row.jumlah_item),
                    borderWidth: 1,
                },
            ],
        },
    });
}
