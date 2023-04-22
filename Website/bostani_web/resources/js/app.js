import "./bootstrap";
import {
    Chart,
    Datepicker,
    Input,
    Modal,
    Ripple,
    Select,
    initTE,
} from "tw-elements";
initTE({ Chart, Datepicker, Input, Modal, Ripple, Select });

const dataPendapatanBulanan = {
    type: "line",
    data: {
        labels: ["Januari", "Februari", "Maret", "April"],
        datasets: [
            {
                label: "Pendapatan Tahun 2023",
                data: [2112, 2343, 2545, 3423],
            },
        ],
    },
};

const dataJumlahPendapatanBulanan = {
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (context) {
                        let label = context.dataset.label || "";
                        label = `${label}: ${context.formattedValue} users`;
                        return label;
                    },
                },
            },
        },
    },
};

const dataPendapatanHarian = {
    type: "line",
    data: {
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        datasets: [
            {
                label: "Pendapatan Harian",
                data: [2112, 2343, 2545, 3423],
            },
        ],
    },
};

const dataJumlahPendapatanHarian = {
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (context) {
                        let label = context.dataset.label || "";
                        label = `${label}: ${context.formattedValue} users`;
                        return label;
                    },
                },
            },
        },
    },
};

const dataProdukPesanan = {
    type: "bar",
    data: {
        labels: [
            "Kentang",
            "Bayam",
            "Dada Ayam",
            "Alpukat Mentega",
            "Tahu Putih",
            "Buncis",
            "Brokoli",
            "Pepaya",
            "Strawberry",
            "Kiwi",
        ],
        datasets: [
            {
                label: "Produk Pesanan",
                data: [100, 90, 80, 70, 60, 50, 40, 30, 20, 10, 5],
            },
        ],
    },
};

const dataJumlahProdukPesanan = {
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (context) {
                        let label = context.dataset.label || "";
                        label = `${label}: ${context.formattedValue} users`;
                        return label;
                    },
                },
            },
        },
    },
};

new Chart(
    document.getElementById("grafik-pendapatan-harian"),
    dataPendapatanHarian,
    dataJumlahPendapatanHarian
);

new Chart(
    document.getElementById("grafik-pendapatan-bulanan"),
    dataPendapatanBulanan,
    dataJumlahPendapatanBulanan
);

new Chart(
    document.getElementById("grafik-produk-pesanan"),
    dataProdukPesanan,
    dataJumlahProdukPesanan
);
