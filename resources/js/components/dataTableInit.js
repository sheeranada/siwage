import $ from "jquery";
window.$ = window.jQuery = $;

import "datatables.net-bs4";
import "datatables.net-buttons-bs4";
import "datatables.net-responsive-bs4";
import "datatables.net-buttons/js/buttons.colVis.js";
import "datatables.net-buttons/js/buttons.html5.js";
import "datatables.net-buttons/js/buttons.print.js";

import pdfMake from "pdfmake/build/pdfmake";
import * as pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.default;
window.pdfMake = pdfMake;

export function initDataTables(selector = "#myTable") {
    $(selector).DataTable({
        paging: false,
        searching: false,
        info: true,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        layout: {
            topStart: ["buttons"],
            topEnd: ["search"],
        },
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        ],
    });
}
