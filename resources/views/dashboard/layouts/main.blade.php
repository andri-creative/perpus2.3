<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" data-assets-path="../../../assets" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=Ddevice-width, initial-scale=1.0" />
    <title>Perpsutakaan Digital</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}" sizes="16x16" />
    <!-- Remix Icon font css -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}" />
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}" />
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}" />
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}" />
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custon.css') }}" />
    <!-- Loading -->
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- CSS -->
    {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />  --}}

    <style>
        .dt-length .dt-input {

            text-align: center;
        }

        .cutom-tr-table td,
        .cutom-tr-table th {
            text-align: start !important;
        }

        th.custom-text-sm {
            font-size: 1px !important;
            color: green !important
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 5px;
            vertical-align: middle;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-spinner {
            display: none;
            margin-left: 5px;
            /* Tambahan untuk memberi jarak dengan teks "Upload" */
        }

        .loading-spinner.active {
            display: inline-block;
        }

        .input-icon {
            position: relative;
            display: inline-block;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .form-control {
            padding-left: 40px;
        }

        .custom-radius {
            border-radius: 0 10px 0 0;
            color: white
        }

        .card-img-top {
            height: 300px;
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .dt-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .dt-button {
            border: 1px solid rgb(0, 47, 255);
            border-radius: 5px;
            padding: 0 15px;
        }

        #reader-isbn {
            width: 100%;
            height: 300px;
            margin: auto;
            border: 1px solid #ddd;
        }

        .input-group button {
            margin-left: 10px;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-left: 0.1rem;
            margin-top: -0.25rem;
        }

        .outer {
            overflow-y: auto;
            height: 200px;
        }

        .outer {
            width: 100%;
            -layout: fixed;
        }

        .outer th {
            text-align: left;
            top: 0;
            position: sticky;
            background-color: white;
        }

        .mini-input {
            width: 30px;
            height: 20px;
            font-size: 12px;
            padding: 2px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;

            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;

        }

        /* drive */
    </style>
</head>

<body>

    <!-- Sidebar -->
    @include('dashboard.layouts.sidebar')
    <!-- End Sidebar -->



    <main class="dashboard-main position-relative">

        <!-- Header -->
        @include('dashboard.layouts.header')

        <!-- Alert -->

        @include('dashboard/components/alert/alert')


        <!-- End Header -->
        <div class="dashboard-main-body">

            <!-- Content -->
            @yield('contents')
            <!-- End Content -->

        </div>

        <!-- Footer -->
        @yield('dashboard.layouts.footer')
        <!-- End Footer -->
    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- Main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/homeOneChart.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/cutomDataTable.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pieChartPageChart.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/columnChartPageChart.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/chartpengunjung.js') }}"></script> --}}

    <script src="{{ asset('assets/js/dashboardChart.js') }}"></script>
    <script src="{{ asset('assets/js/searchBooksPinjam.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert211.js') }}"></script>
    <script src="{{ asset('assets/js/tabelCheckbook.js') }}"></script>



    <!-- Qr Code -->
    <!-- Tambahkan ini sebelum kode JavaScript -->
    <!-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script> -->

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                performSearch();
            }
        });

        function performSearch() {
            const query = document.getElementById('searchInput').value;
            // Lakukan sesuatu dengan query, seperti mengarahkan ke halaman hasil pencarian atau menampilkan hasil secara dinamis
            console.log('Searching for:', query);
            // Contoh: window.location.href = '/search?q=' + encodeURIComponent(query);
        }
    </script>

    <!-- Tata table -->

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css"></script>

    <!-- Export -->
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('#export-pengunjung').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                searching: false, // Nonaktifkan pencarian bawaan
                // "order": [
                //     [1, 'desc']
                // ],
                // "columnDefs": [{
                //     "targets": 0,
                //     "orderable": false
                // }]
            });

            // table.on('draw', function() {
            //     var info = table.page.info();
            //     table.column(0, {
            //         order: 'applied'
            //     }).nodes().each(function(cell, index) {
            //         cell.innerHTML = info.start + index +
            //             1;
            //     });
            // });

            // Event saat dropdown berubah
            $('#yearFilter').on('change', function() {
                var selectedYear = $(this).val(); // Ambil nilai tahun dari dropdown

                if (selectedYear) {
                    // Filter berdasarkan kolom kedua (indeks 1)
                    table.column(1).search('^' + selectedYear + '$', true, false).draw();
                } else {
                    // Reset filter jika "All" dipilih
                    table.column(1).search('').draw();
                }
            });
        });
    </script>



    <!-- Delete Pengunjung -->
    <script>
        // Memantau perubahan checkbox
        const checkboxes = document.querySelectorAll('.select-row');
        const deleteButton = document.getElementById('deleteButton');
        const selectAllCheckbox = document.getElementById('selectAll');

        // Fungsi untuk mengupdate tombol Delete
        function updateDeleteButton() {
            // Memeriksa apakah ada checkbox yang dicentang
            const checkedCheckboxes = document.querySelectorAll('.select-row:checked');
            if (checkedCheckboxes.length > 0) {
                deleteButton.classList.remove('d-none'); // Menampilkan tombol Delete
            } else {
                deleteButton.classList.add('d-none'); // Menyembunyikan tombol Delete
            }
        }

        // Menambahkan event listener untuk setiap checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateDeleteButton);
        });

        // Fungsi untuk menangani select all checkbox
        selectAllCheckbox.addEventListener('change', function() {
            // Jika checkbox selectAll dicentang, semua checkbox individual akan dicentang
            const isChecked = selectAllCheckbox.checked;
            checkboxes.forEach(checkbox => checkbox.checked = isChecked);
            updateDeleteButton(); // Update tombol delete setelah select all
        });

        // Fungsi untuk menghapus data (tombol Delete)
        deleteButton.addEventListener('click', function() {
            // Ambil data checkbox yang dicentang
            const selectedRows = document.querySelectorAll('.select-row:checked');
            const selectedIds = Array.from(selectedRows).map(row => row.id.replace('checkbox-',
                '')); // Mengambil ID tanpa prefix

            if (selectedIds.length === 0) {
                alert("Tidak ada data yang dipilih!");
                return;
            }

            // Kirim data ke server menggunakan AJAX
            fetch('{{ route('delete.pengunjung') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Pastikan CSRF token ada
                    },
                    body: JSON.stringify({
                        ids: selectedIds
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Menghapus baris yang terpilih dari tabel
                        selectedRows.forEach(row => row.closest('tr').remove());
                        updateDeleteButton(); // Update tombol delete setelah penghapusan
                        alert(data.message);
                    } else {
                        alert('Gagal menghapus data');
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan. Coba lagi nanti.');
                    console.error('Error:', error);
                });
        });
    </script>

    <script>
        window.onload = function() {
            var textElements = document.querySelectorAll(".long-text");

            textElements.forEach(function(textElement) {
                var text = textElement.innerHTML;

                var words = text.split(" "); // Pisahkan teks berdasarkan spasi
                if (words.length > 3) {
                    // Gabungkan dua kata pertama dan tambahkan '...'
                    textElement.innerHTML = words.slice(0, 3).join(" ") + "...";
                }
            });
        }
    </script>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            // Sembunyikan rack details
            document.getElementById('rackDetails').style.display = 'none';

            // Tampilkan form edit
            document.getElementById('editForm').style.display = 'block';

            // Tampilkan tombol Cancel
            document.getElementById('cancelButton').style.display = 'inline-flex';
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            // Tampilkan rack details
            document.getElementById('rackDetails').style.display = 'block';

            // Sembunyikan form edit
            document.getElementById('editForm').style.display = 'none';

            // Sembunyikan tombol Cancel
            document.getElementById('cancelButton').style.display = 'none';
        });
    </script>

    <!-- View -->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                    $("#actionButtons").removeClass("d-none");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this);
        });

        // Fungsi untuk tombol Cancel
        $("#cancelButton").click(function() {
            // Hapus gambar yang di-upload
            $("#imageUpload").val('');
            $("#imagePreview");
            // Sembunyikan tombol Save dan Cancel
            $("#actionButtons").addClass("d-none");
            location.reload();
        });

        // Fungsi untuk tombol Save
        // Fungsi untuk tombol Save
        $("#saveButton").click(function(e) {
            e.preventDefault(); // Mencegah form submit biasa
            var formData = new FormData($('#photoForm')[0]);

            $.ajax({
                url: $('#photoForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#actionButtons").addClass("d-none");
                    {{--  alert("Gambar berhasil disimpan!");  --}}
                    $('#imagePreview').css("background-image", "url(" + response.newImageUrl + ")");
                    location.reload();
                },
                error: function(response) {
                    alert("Terjadi kesalahan saat menyimpan gambar.");
                }
            });
            return false;
        });
    </script>

    <script>
        let form = document.querySelector('#some-form');
        let loader = document.querySelector('#loader')

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // using non css framework method with Style
            loader.style.display = 'block';

            // using a css framework such as TailwindCSS
            loader.classList.remove('hidden');

            // pretend the form has been sumitted and returned
            setTimeout(() => loader.style.display = 'none', 1000);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cancel_button').click(function() {
                // Mengosongkan semua input di form
                $('#myForm')[0].reset();
            });
        });

        // Generaate Password
        $(document).ready(function() {
            // Fungsi untuk menghasilkan password acak
            $('#generatePassword').click(function() {
                function generateRandomPassword(length) {
                    const characters =
                        'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]';
                    let password = '';
                    for (let i = 0; i < length; i++) {
                        password += characters.charAt(Math.floor(Math.random() * characters.length));
                    }
                    return password;
                }
                const newPassword = generateRandomPassword(12);
                $('#password').val(newPassword);
            });

            // Fungsi untuk menyalin password ke clipboard saat tombol Copy diklik
            $('.input-group-text').click(function() {
                const password = $('#password').val();
                if (password) {
                    copyToClipboard(password);
                }
            });

            // Fungsi untuk menyalin teks ke clipboard
            function copyToClipboard(text) {
                const tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(text).select();
                document.execCommand('copy');
                tempInput.remove();

                // Mengubah ikon dan teks Copy menjadi centang
                const copyButton = $('.input-group-text');
                copyButton.html('<iconify-icon icon="lucide:check"></iconify-icon> Copied');
                copyButton.addClass('text-success');

                // Mengembalikan ikon dan teks ke "Copy" setelah beberapa detik
                setTimeout(function() {
                    copyButton.html('<iconify-icon icon="lucide:copy"></iconify-icon> Copy');
                    copyButton.removeClass('text-success');
                }, 2000); // Kembali ke "Copy" setelah 2 detik
            }

            // Fungsi untuk menampilkan atau menyembunyikan password
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                // Mengubah teks "Show Password" atau "Hide Password"
                $(this).text(type === 'password' ? 'Show Password' : 'Hide Password');
            });
        });
    </script>

    <!-- Pinjam -->
    <script>
        $(document).ready(function() {

            // Event untuk tombol Cari
            $('#searchButton').on('click', function() {
                let query = $('#searchInput').val(); // Ambil nilai dari input search
                console.log('Input value:', query);

                if (query.trim().length > 0) {
                    $.ajax({
                        url: "{{ route('books.search') }}", // Ganti dengan route pencarian buku
                        method: 'GET',
                        data: {
                            search: query
                        },
                        success: function(data) {
                            $('#bookResults').html(data); // Tampilkan hasil pencarian
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseJSON
                                .message); // Tampilkan pesan error jika ada
                        }
                    });
                } else {
                    $('#bookResults').html(''); // Kosongkan hasil jika input kosong
                    alert('Masukkan kata kunci untuk mencari buku.');
                }
            });

            // Event untuk memilih buku dari hasil pencarian
            $(document).on('click', '.book-item', function() {
                // Periksa apakah buku habis (stock-out)
                if ($(this).hasClass('stock-out')) {
                    alert('Buku ini telah habis dan tidak dapat dipinjam.');
                    return; // Hentikan eksekusi
                }

                // Ambil data buku dari elemen
                let isbn = $(this).data('isbn');
                let judul = $(this).data('judul');
                let rack = $(this).data('rack') || 'Rak Tidak Tersedia';
                let subRack = $(this).data('sub-rack') ||
                    'Sub-Rak tidak tersedia'; // Nilai default jika kosong
                let idBooks = $(this).data('id-books');

                // Debugging untuk memeriksa nilai yang diambil
                console.log('ISBN:', isbn);
                console.log('Judul:', judul);
                console.log('Rak:', rack);
                console.log('Sub-Rak:', subRack);
                console.log('ID Buku:', idBooks);

                // Pastikan data lengkap
                if (isbn && judul && rack) {
                    // Kloning template buku dan menampilkan data
                    let newBookInfo = $('.book-info-template').clone().removeClass('book-info-template')
                        .show();

                    // Isi elemen yang baru dibuat dengan data
                    newBookInfo.find('.isbn_pinjam').text(isbn);
                    newBookInfo.find('.judul_buku').text(judul);
                    newBookInfo.find('.rack_buku').text(rack + ' & ' + subRack); // Menampilkan subRack
                    newBookInfo.find('.id_books').attr('name', 'id_books[]').val(idBooks).attr('type',
                        'hidden');
                    newBookInfo.find('.counter_value').attr('name', 'counter[]').val(1);

                    // Tambahkan elemen baru ke dalam container
                    $('.books-container').parent().append(newBookInfo);
                } else {
                    console.log('Data tidak lengkap, tidak dapat menambahkan buku');
                }
            });


            // Event untuk menambah jumlah buku
            $(document).on('click', '.btn-plus', function() {
                let counterElement = $(this).siblings('.counter');
                let currentCount = parseInt(counterElement.text());
                currentCount++;
                counterElement.text(currentCount);
                $(this).siblings('.counter_value').val(currentCount);
            });

            // Event untuk mengurangi jumlah buku
            $(document).on('click', '.btn-minus', function() {
                let counterElement = $(this).siblings('.counter');
                let currentCount = parseInt(counterElement.text());
                if (currentCount > 1) {
                    currentCount--;
                    counterElement.text(currentCount);
                    $(this).siblings('.counter_value').val(currentCount);
                }
            });

            // Event untuk menghapus buku dari daftar
            $(document).on('click', '.btn-remove', function() {
                if ($('.books-container').parent().find('.row').length > 1) {
                    $(this).closest('.row').remove(); // Hapus elemen buku yang dipilih
                } else {
                    alert('Setidaknya harus ada satu buku dipinjam.');
                }
            });
        })
    </script>



    <script>
        $(".remove-button").on("click", function() {
            $(this).closest(".alert").addClass("d-none");
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#code_category').on('input', function() {
                var codecategory = $(this).val();
                console.log("Input value: " + codecategory);

                if (codecategory.length > 0) {
                    $.ajax({
                        url: '/get-category/' + codecategory,
                        method: 'GET',
                        success: function(response) {
                            console.log("Response:", response); // Log the response
                            if (response.name_category) {
                                $('#name_category').val(response.name_category);
                            } else {
                                $('#name_category').val('Kategori tidak ditemukan');
                            }
                        },
                        error: function(xhr) {
                            console.error("Error:", xhr.responseText); // Log errors if any
                            $('#name_category').val('Error retrieving data');
                        }
                    });
                } else {
                    $('#name_category').val('');
                }
            });
        });

        $(document).ready(function() {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#rak').change(function() {
                var rakId = $(this).val();
                if (rakId) {
                    $.ajax({
                        url: "{{ route('get.subs') }}", // Pastikan route ini benar
                        type: "POST",
                        data: {
                            id_rack: rakId // Pastikan parameter ini sesuai dengan yang di controller
                        },
                        success: function(data) {
                            console.log(data); // Debugging response dari server
                            $('#subs').empty();
                            $('#subs').empty().append(
                                '<option value="" selected>Pilih Sub Rak</option>');
                            $.each(data, function(key, value) {
                                $('#subs').append('<option value="' + value.code_sub +
                                    '">' +
                                    value.code_sub + '</option>');
                            });
                        },
                        error: function(xhr) {
                            $('#subs').html('<option>Gagal memuat Sub Rak</option>');
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#subs').empty();
                    $('#subs').empty().append('<option>Pilih Sub Rak</option>');
                }
            });
            var bookItems = $('.book-item');
            var limit = 9;

            bookItems.slice(limit).hide();
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('#books').DataTable({
                language: {
                    lengthMenu: "_MENU_",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(difilter dari _MAX_ total entri)",
                    search: "Search Judul Buku / ISBN:",
                },
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10,
                "searching": true
            });
        });
        $('#categoryDropdown').on('change', function() {
            var category = $(this).val();
            table.column(2).search(category).draw();
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#file-upload-name").on("change", function(event) {
                var fileInput = event.target;
                var fileList = fileInput.files;
                var ul = $("#uploaded-file-names");

                // Add show-uploaded-file-name class to the ul element if not already added
                ul.addClass("show-uploaded-file-name");

                // Clear the list before appending new files
                ul.empty();

                // Append each uploaded file name as a list item
                $.each(fileList, function(index, file) {
                    var li = $("<li></li>").addClass(
                        "uploaded-file-name-list text-primary-600 fw-semibold d-flex align-items-center gap-2"
                    );

                    // Create the Link Iconify icon element
                    var iconifyIcon = $("<iconify-icon></iconify-icon>")
                        .attr("icon", "ph:link-break-light")
                        .addClass("text-xl text-secondary-light");

                    // Create the Cross Iconify icon element
                    var crossIconifyIcon = $("<iconify-icon></iconify-icon>")
                        .attr("icon", "radix-icons:cross-2")
                        .addClass("remove-file text-xl text-secondary-light text-hover-danger-600");

                    // Add event listener to remove the file on click
                    crossIconifyIcon.on("click", function() {
                        li.remove(); // Remove the corresponding list item
                    });

                    // Append the icons and file name to the list item
                    li.append(iconifyIcon);
                    li.append(document.createTextNode(" " + file.name));
                    li.append(crossIconifyIcon);

                    // Append the list item to the unordered list
                    ul.append(li);
                });
            });
        });
    </script>


    <!--- Dropdown --->
    <script>
        function updateDropdownFromDB(category, default_duration) {
            // Update teks dropdown
            document.getElementById("dropdownButton").innerText = category;

            // Set nilai kategori dan durasi ke dalam input hidden
            document.getElementById("positionBorrow").value = category;
            document.getElementById("borrowDuration").value = default_duration;

            // Menampilkan atau menyembunyikan input tambahan berdasarkan kategori
            const inputContainer = document.getElementById("inputContainer");
            const customInput = document.getElementById("customInput");
            const classOrNotes = document.getElementById("classOrNotes");

            if (category.includes("Siswa")) {
                inputContainer.style.display = "block";
                customInput.placeholder = "Masukkan Kelas";
                customInput.addEventListener("input", function() {
                    classOrNotes.value = customInput.value;
                });
            } else {
                inputContainer.style.display = "none";
                classOrNotes.value = ""; // Reset nilai jika kategori bukan Siswa
            }
        }

        // Menangani dropdown submenu
        document.querySelectorAll(".dropdown-submenu").forEach(function(submenu) {
            submenu.addEventListener("mouseenter", function() {
                const submenuDropdown = submenu.querySelector(".dropdown-menu");
                submenuDropdown.style.display = "block";
            });

            submenu.addEventListener("mouseleave", function() {
                const submenuDropdown = submenu.querySelector(".dropdown-menu");
                submenuDropdown.style.display = "none";
            });
        });
    </script>

    <script>
        // Event listener untuk tombol delete di elemen yang baru ditambahkan
        $(document).on("click", ".dalete-durasi", function() {
            const li = $(this).closest("li");
            const itemId = li.data("id");

            if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                // Kirim permintaan AJAX untuk menghapus data
                $.ajax({
                    url: `/durations/${itemId}`, // Endpoint Laravel
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function() {
                        li.remove(); // Hapus elemen dari DOM
                        alert("Item berhasil dihapus.");
                    },
                    error: function() {
                        alert("Gagal menghapus item.");
                    },
                });
            }
        });

        // Event listener untuk tombol edit
        $(document).on("click", ".edit-durasi", function() {
            const icon = $(this);
            const li = icon.closest("li");
            const durationSpan = li.find(".editable-duration");

            const originalDuration = parseInt(durationSpan.text().trim());

            const durationInput = $(`<input type="number" class="form-control" />`).val(originalDuration);

            // Ganti teks durasi dengan input
            durationSpan.empty().append(durationInput);
            durationInput.focus().select();

            const saveChanges = () => {
                const newDuration = durationInput.val();

                $.ajax({
                    url: `/durations/${li.data("id")}`, // Endpoint Laravel
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        duration: newDuration,
                    },
                    success: function(response) {
                        durationSpan.text(response
                            .updated_duration);

                    },
                    error: function() {
                        alert("Gagal memperbarui durasi.");
                        durationSpan.text(originalDuration); // Kembalikan durasi asli jika gagal
                    },
                });
            };


            durationInput.blur(saveChanges);

            durationInput.keypress(function(e) {
                if (e.which == 13) saveChanges(); // Simpan saat Enter ditekan
            });
        });
    </script>

    <script>
        // Togel Durasi
        const addRowButton = document.getElementById("addRow");
        const newDurationForm = document.getElementById("newDurationForm");

        addRowButton.addEventListener("click", function() {
            // Toggle visibility of the form
            if (newDurationForm.classList.contains("d-none")) {
                newDurationForm.classList.remove("d-none");
            } else {
                newDurationForm.classList.add("d-none");
            }
        });
    </script>
</body>

</html>
