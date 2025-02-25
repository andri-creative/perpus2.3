<div class="site-content">
    <main id="main" class="site-main">
        <div class="books-full-width">
            <div class="container">
                <div class="new-user-head mb-10">
                    <h2 style="color: black;">Keluar</h2>
                    <span class="underline left"></span>
                </div>
                <form id="searchForm" class="mb-4 position-relative">
                    <div class="cutom-grub input-group">
                        <div class="posisi-input-clear" style="flex-grow: 1;">
                            <input type="text" name="search" id="searchInput" class="form-control input-clear"
                                placeholder="Cari nama..." autocomplete="off" value="{{ $search ?? '' }}">
                            <!-- Tombol clear -->
                            <span id="clearInput" class="clear-icon">
                                &#x2716;
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Cari</button>
                    </div>
                </form>

                <div id="tableContainer">
                    @include('partials.pengunjung_table', ['pengunjung' => $pengunjung])
                </div>
            </div>
        </div>
    </main>
</div>