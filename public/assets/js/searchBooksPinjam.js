$(document).ready(function () {
    $(".button-submit-book").click(function () {
        var query = $('input[name="searchBooks"]').val().trim();
        // alert("ini mada");

        if (query === "") {
            $("#dataList-books").html("");
            return;
        }

        $.ajax({
            url: "/dashboard/search",
            method: "GET",
            data: { searchBooks: query },
            success: function (data) {
                // console.log(data);
                $("#dataList-books").html(data);
            },
            error: function (xhr) {
                console.log("Terjadi Kesalahan:" + xhr.responseJSON.message);
            },
        });
    });

    $(document).on("click", ".tambah-buku", function () {
        var row = $(this).closest("tr");
        var isbnBuku = row.find(".isbn-buku").text();
        var judulBuku = row.find(".judul-buku").text();
        var rakBuku = row.find(".rak-buku").text();
        var idBuku = row.find(".id-buku").val();
        var jumlahBuku = parseInt(row.find(".number-books").text());

        if (jumlahBuku <= 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Buku telah habis.",
            });
            return;
        }

        if (isbnBuku && judulBuku && rakBuku && idBuku) {
            let LisBukuPinjam = $(".list-Pimjam-buku")
                .first()
                .clone()
                .removeClass("d-none");

            LisBukuPinjam.find(".isbn-pinjam").text(isbnBuku);
            LisBukuPinjam.find(".judul-pinjam").text(judulBuku);
            LisBukuPinjam.find(".rak-pinjam").text(rakBuku);
            LisBukuPinjam.find(".id_books-pinjam")
                .attr("name", "id_books-pinjam[]")
                .val(idBuku)
                .attr("type", "hidden");

            LisBukuPinjam.find(".counter_value-pinjam")
                .attr("name", "counter-pinjam[]")
                .val(1);

            console.log("Cloned ISBN: " + isbnBuku);
            console.log("Cloned Judul: " + judulBuku);
            console.log("Cloned Rak: " + rakBuku);
            console.log("Cloned ID: " + idBuku);
            console.log("Counter: " + idBuku);

            $(".daftar-pinjam").append(LisBukuPinjam);
        }
    });

    // Tombol
    $(document).on("click", ".btn-increment", function (e) {
        e.preventDefault();
        let counterElement = $(this).siblings(".counter-pinjam");
        let counterValueElement = $(this).siblings(".counter_value-pinjam");
        let currentCount = parseInt(counterElement.val());
        currentCount++;
        counterElement.val(currentCount);
        counterValueElement.val(currentCount);
    });

    $(document).on("click", ".btn-decrement", function (e) {
        e.preventDefault();
        let counterElement = $(this).siblings(".counter-pinjam");
        let counterValueElement = $(this).siblings(".counter_value-pinjam");
        let currentCount = parseInt(counterElement.val());
        if (currentCount > 1) {
            currentCount--;
            counterElement.val(currentCount);
            counterValueElement.val(currentCount);
        }
    });

    // Delete Daftar Buku
    $(document).on("click", ".delete-daftar-buku", function () {
        console.log("Tombol remove diklik");
        $(this).closest("tr").remove();
    });
});
