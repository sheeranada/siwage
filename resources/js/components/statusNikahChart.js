import Chart from "chart.js/auto";

export default function initStatusNikahChart() {
    const chartEl = document.getElementById("statusNikahChart");
    if (!chartEl) return;

    const labels = JSON.parse(chartEl.dataset.labels);
    const values = JSON.parse(chartEl.dataset.values);

    new Chart(chartEl.getContext("2d"), {
        type: "doughnut",
        data: {
            labels,
            datasets: [
                {
                    data: values,
                    backgroundColor: [
                        "#20c997",
                        "#ffc107",
                        "#dc3545",
                        "#6f42c1",
                        "#007bff",
                        "#fd7e14",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Statistik Warga Berdasarkan Status Nikah",
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    });
}
