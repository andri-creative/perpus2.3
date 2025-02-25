const url = "api/beranda/bukuterbaru";

fetch(url)
    .then((res) => res.json())
    .then((data) => {
        console.log(data);
        const judulElement = document.querySelector(".judul_baru");
        if (judulElement) {
            judulElement.textContent =
                data[2]?.judul_books || "Judul Tidak Tersedia";
        }
    })
    .catch((error) => console.error("Error:", error));
