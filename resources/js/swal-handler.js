document.addEventListener("DOMContentLoaded", function () {
    if (typeof Swal !== "undefined") {
        if (window.successMessage) {
            Swal.fire({
                title: "Sukses!",
                text: window.successMessage,
                icon: "success",
                confirmButtonText: "OK",
            });
        }

        if (window.validationErrors && window.validationErrors.length > 0) {
            Swal.fire({
                title: "Validasi Gagal!",
                html: window.validationErrors.join("<br>"),
                icon: "error",
                confirmButtonText: "OK",
            });
        }
    }
});
