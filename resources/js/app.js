// import "./bootstrap";
import Chart from "chart.js/auto";
window.Chart = Chart;

import "./swal-handler";
import Swal from "sweetalert2";
window.Swal = Swal;

import initDeleteConfirmation from "./components/deleteConfirm";

document.addEventListener("DOMContentLoaded", () => {
    initDeleteConfirmation();
});

// cart

import initWargaChart from "./components/wargaChart";
import initKelompokChart from "./components/kelompokChart";
import initPendidikanChart from "./components/pendidikanChart";
import initPekerjaanChart from "./components/pekerjaanChart";
import initUmurChart from "./components/umurChart";
import initStatusNikahChart from "./components/statusNikahChart";

document.addEventListener("DOMContentLoaded", () => {
    initDeleteConfirmation();
    initWargaChart();

    const kelompokData = window.kelompokChartData ?? null;
    initKelompokChart(kelompokData);

    initPendidikanChart();
    initPekerjaanChart();
    initUmurChart();
    initStatusNikahChart();
});

import { initDataTables } from "./components/dataTableInit";

// Tunggu DOM siap
$(document).ready(function () {
    initDataTables();
});
