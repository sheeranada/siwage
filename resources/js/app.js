import Swal from "sweetalert2";

window.Swal = Swal;

import "./bootstrap";

import $ from "jquery";
import "datatables.net-bs5";
import "datatables.net-responsive-bs5";

$(document).ready(function () {
    $("#myTable").DataTable({
        responsive: true,
        columnDefs: [
            {
                targets: [0, 1, 3, 4, 16],
                className: "text-center",
            },
            {
                responsivePriority: 1,
                targets: 0,
            },
            {
                responsivePriority: 2,
                targets: -1,
            },
        ],
    });
});
