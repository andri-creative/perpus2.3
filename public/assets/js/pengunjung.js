// // ================== Hover =======================//
// const tooltipTriggerList = document.querySelectorAll(
//     '[data-bs-toggle="tooltip"]'
// );
// const tooltipList = [...tooltipTriggerList].map(
//     (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
// );

// $(document).ready(function () {
//     $(".tooltip-button").each(function () {
//         var tooltipButton = $(this);
//         var tooltipContent = $(this).siblings(".my-tooltip").html();

//         tooltipButton.tooltip({
//             title: tooltipContent,
//             trigger: "hover",
//             html: true,
//         });

//         tooltipButton.on("mouseenter", function () {
//             tooltipButton
//                 .tooltip("dispose")
//                 .tooltip({
//                     title: tooltipContent,
//                     trigger: "hover",
//                     html: true,
//                 })
//                 .tooltip("show");
//         });
//     });
// });

// ================== Form Validate =======================//
(() => {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

// ================== End Form Validate =======================//

// ================== Qr Code =======================//
const formURL = window.location.href;

const qrcode = new QRCode(document.getElementById("qrcode"), {
    text: formURL,
    width: 350,
    height: 350,
    colorDark: "#ffffff",
    colorLight: "transparent",
    correctLevel: QRCode.CorrectLevel.H,
});
// ================== End Qr Code =======================//

// ================== Date Time =======================//
function updateDateTime() {
    const dateTimeInput = document.getElementById("date-time");
    const now = new Date();

    // Array nama hari dan bulan
    const days = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
    ];
    const months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];

    // Format: Hari, DD Bulan YYYY HH:mm:ss
    const day = days[now.getDay()];
    const date = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const seconds = now.getSeconds().toString().padStart(2, "0");

    const formattedDateTime = `${day}, ${date} ${month} ${year} ${hours}:${minutes}:${seconds}`;
    dateTimeInput.value = formattedDateTime;
}

// Perbarui setiap detik
setInterval(updateDateTime, 1000);

updateDateTime();
// ================== End Date Time =======================//

// ================== Input Kelas =======================//
document.getElementById("kelas-input").addEventListener("input", function () {
    const inputField = this;
    const value = inputField.value.trim();
    const feedback = inputField.nextElementSibling;

    // Pola untuk format angka.angka (contoh: 1.1, 2.12)
    const pattern = /^[1-6]\.(1[0-2]|[1-9])$|^guru$|^outsider$/i;

    // Periksa apakah nilai sesuai pola
    if (pattern.test(value)) {
        // Nilai valid
        inputField.classList.remove("is-invalid");
        inputField.classList.add("is-valid");
        feedback.style.display = "none";
    } else {
        // Nilai tidak valid
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        feedback.style.display = "block";
    }
});
// ================== End Input Kelas =======================//
