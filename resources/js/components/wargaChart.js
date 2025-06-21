import Chart from "chart.js/auto";

export default function initWargaChart() {
    const chartEl = document.getElementById("wargaChart");
    if (!chartEl) return;

    const totalLaki = chartEl.dataset.laki;
    const totalPerempuan = chartEl.dataset.perempuan;

    new Chart(chartEl.getContext("2d"), {
        type: "pie",
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [
                {
                    data: [totalLaki, totalPerempuan],
                    backgroundColor: ["#007bff", "#e83e8c"],
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Statistik Warga Berdasarkan Gender",
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    });
}
