import Chart from "chart.js/auto";

export default function initPekerjaanChart() {
    const chartEl = document.getElementById("pekerjaanChart");
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
                    backgroundColor: "#17a2b8",
                    borderColor: "#138496",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Statistik Warga Berdasarkan Pekerjaan",
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
