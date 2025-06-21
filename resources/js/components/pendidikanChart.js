import Chart from "chart.js/auto";

export default function initPendidikanChart() {
    const chartEl = document.getElementById("pendidikanChart");
    if (!chartEl) return;

    const labels = JSON.parse(chartEl.dataset.labels || "[]");
    const values = JSON.parse(chartEl.dataset.values || "[]");

    new Chart(chartEl.getContext("2d"), {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Jumlah Warga",
                    data: values,
                    backgroundColor: "#ffc107",
                    borderColor: "#e0a800",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Statistik Warga Berdasarkan Pendidikan",
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}
