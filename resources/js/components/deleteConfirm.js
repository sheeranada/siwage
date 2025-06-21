import Swal from "sweetalert2";

export default function initDeleteConfirmation() {
    document.querySelectorAll(".show_confirm").forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const form = this.closest("form");

            Swal.fire({
                title: "Yakin mau hapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
}
