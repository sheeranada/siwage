import Chart from "chart.js/auto";

export default function initKelompokChart(kelompokData) {
    const chartEl = document.getElementById("kelompokChart");
    if (!chartEl || !kelompokData) return;

    const labels = kelompokData.map((k) => k.nama_kelompok);
    const data = kelompokData.map((k) => k.total);

    new Chart(chartEl.getContext("2d"), {
        type: "bar",
        data: {
            labels,
            datasets: [
                {
                    label: "Jumlah Warga",
                    data,
                    backgroundColor: "#20c997",
                    borderColor: "#17a2b8",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "Jumlah Warga per Kelompok",
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 },
                },
                x: {
                    ticks: {
                        autoSkip: false,
                        maxRotation: 45,
                        minRotation: 30,
                    },
                },
            },
        },
    });
}
