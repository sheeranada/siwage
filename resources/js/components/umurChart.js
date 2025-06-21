import Chart from "chart.js/auto";

export default function initUmurChart() {
    const chartEl = document.getElementById("umurChart");
    if (!chartEl) return;

    const labels = JSON.parse(chartEl.dataset.labels);
    const values = JSON.parse(chartEl.dataset.values);

    new Chart(chartEl.getContext("2d"), {
        type: "bar",
        data: {
            labels,
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
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: "Statistik Warga Berdasarkan Umur",
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
