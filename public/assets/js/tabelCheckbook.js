$(document).ready(function () {
    // Fungsi untuk mengatur tombol (enable/disable) dan menampilkan jumlah data terpilih
    function toggleButtons() {
        const checkedCount = $(".item-checkbox-kembali:checked").length;
        $(".kembali-data, .delete-data-kembali").prop(
            "disabled",
            checkedCount === 0
        );
        $(".badge.bg-white.text-dark.radius-5.text-xs").text(checkedCount);
    }

    // Select All: Centang semua checkbox
    $("#select-all-kembali").change(function () {
        const isChecked = $(this).is(":checked");
        $(".form-check-kembali").prop("checked", isChecked);
        toggleButtons();
    });

    // Perubahan individual checkbox
    $(".form-check-kembali").change(function () {
        const allChecked =
            $(".form-check-kembali:checked").length ===
            $(".form-check-kembali").length;
        $("#select-all-kembali").prop("checked", allChecked);
        toggleButtons();
    });

    // Inisialisasi tombol
    toggleButtons();

    // Handle event klik tombol "Kembali"
    const $checkboxes = $(".item-checkbox-kembali");
    const $kembaliButton = $("#kembali-data_buku");

    $kembaliButton.click(function () {
        let selectedIds = $checkboxes
            .filter(":checked")
            .map(function () {
                return this.id.replace("book_kembali-", "");
            })
            .get();

        if (selectedIds.length === 0) {
            alert("Tidak ada data yang dipilih!");
            return;
        }

        console.log("Selected IDs:", selectedIds);

        let urlKembali = "/kembali/kembali-buku";
        let token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        fetch(urlKembali, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                ids: Array.isArray(selectedIds) ? selectedIds : [selectedIds],
            }),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                console.log("Response dari server:", data);
                if (data.success) {
                    // alert(data.message);
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: data.message,
                        timer: 3000,
                        showConfirmButton: false,
                    }).then(() => {
                        location.reload();
                    });

                    // location.reload(); // Reload halaman untuk update tampilan data
                } else {
                    alert("Gagal: " + data.message);
                }
            })
            .catch(function (error) {
                console.error("Terjadi kesalahan:", error);
                // alert("Terjadi kesalahan: " + error.message);
            });
    });

    // handle event "Delete"
    const $deleteButton = $("#delete-kembali_data");

    $deleteButton.click(function () {
        let selectedIds = $checkboxes
            .filter(":checked")
            .map(function () {
                return this.id.replace("book_kembali-", "");
            })
            .get();

        if (selectedIds.length === 0) {
            alert("Tidak ada data yang dipilih!");
            return;
        }

        console.log("Selected IDs untuk delete:", selectedIds);

        let deleteUrl = "/kembali/delete-data";
        let token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        fetch(deleteUrl, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({ ids: selectedIds }),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                console.log("Response dari server:", data);
                if (data.success) {
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: data.message,
                        timer: 3000,
                        showConfirmButton: false,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Gagal: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Terjadi kesalahan:", error);
                alert("Terjadi kesalahan: " + error.message);
            });
    });
});
