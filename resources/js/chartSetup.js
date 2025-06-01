import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend,
    PieController,
    ArcElement,
} from "chart.js";

Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend,
    PieController,
    ArcElement
);

window.createWargaChart = function (ctx, labels, data) {
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Jumlah Warga",
                    data: data,
                    backgroundColor: [
                        "rgba(54, 162, 235, 0.7)", // Biru untuk L
                        "rgba(255, 99, 132, 0.7)", // Pink untuk P
                    ],
                    borderColor: [
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 99, 132, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "bottom",
                },
                title: {
                    display: true,
                    text: "Statistik Jenis Kelamin Warga",
                },
            },
        },
    });
};
