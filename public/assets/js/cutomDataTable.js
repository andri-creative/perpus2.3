$(document).ready(function () {
    $("#category").DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "_MENU_",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total entri)",
            search: "Search:",
        },
    });
    $("#rack").DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "_MENU_",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total entri)",
            search: "Search:",
        },
    });
    $("#sub").DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "_MENU_",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total entri)",
            search: "Search:",
        },
    });
});
