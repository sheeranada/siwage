import * as bootstrap from "bootstrap";
import jszip from "jszip";
import pdfmake from "pdfmake";
import DataTable from "datatables.net-bs5";
import "datatables.net-buttons-bs5";
import "datatables.net-buttons/js/buttons.colVis.mjs";
import "datatables.net-buttons/js/buttons.html5.mjs";
import "datatables.net-buttons/js/buttons.print.mjs";
import "datatables.net-responsive-bs5";
import "datatables.net-searchbuilder-bs5";

DataTable.use(bootstrap);
DataTable.Buttons.jszip(jszip);
DataTable.Buttons.pdfMake(pdfmake);

document.addEventListener("DOMContentLoaded", function () {
    new DataTable("#cetakWarga", {
        layout: {
            top1: "searchBuilder",
            topStart: {
                buttons: ["copy", "excel", "print", "colvis"],
            },
        },
        // dom: "QBfrtip",
        // buttons: ["copy", "excel", "colvis", "print"],
    });
});
