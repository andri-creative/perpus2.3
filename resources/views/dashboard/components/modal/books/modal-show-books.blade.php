<!-- Modal -->
<div class="modal fade " id="show{{ $books->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg-neutral-500 bg-neutral-500 ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary-light " id="staticBackdropLabel">Books
                    Show</h1>
                <button type="button" class="btn-close text-secondary-light" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> {{ $books->id }}</p>
                <p><strong>ISBN:</strong> {{ $books->isbn_books }}</p>
                <p><strong>Judul Buku:</strong> {{ $books->judul_books }}</p>
                <p><strong>Autor:</strong> {{ $books->autor_books }}</p>
                <p><strong>Tahun Terbit:</strong> {{ $books->year_books }}</p>
                <p><strong>Penerbit:</strong> {{ $books->publisher_books }}</p>
                <p><strong>Jumlah Buku:</strong> {{ $books->number_books }}</p>
                <p><strong>Nama Category:</strong> {{ $books->category->name_category }}</p>
                <p><strong>Rak Buku:</strong> {{ $books->rack->name_rack }}</p>
                <p><strong>Sub Rak Buku:</strong> {{ $books->name_rack }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-600 text-white" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
