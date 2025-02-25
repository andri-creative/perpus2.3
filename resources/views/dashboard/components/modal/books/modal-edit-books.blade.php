<!-- Modal -->
<div class="modal fade " id="edit{{ $books->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.books', $books->id) }}" method="POST" class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6 gay-6">
                        <input type="hidden" name="id" value="{{ $books->id }}">
                        <!-- ISBN -->
                        <div class="col-12">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn_books" class="form-control" placeholder="Enter ISBN"
                                value="{{ $books->isbn_books }}">
                        </div>

                        <!-- Book Title -->
                        <div class="col-12">
                            <label class="form-label">Book Title</label>
                            <input type="text" name="judul_books" class="form-control" placeholder="Enter Book Title"
                                value="{{ $books->judul_books }}">
                        </div>

                        <!-- Author's Name -->
                        <div class="col-12">
                            <label class="form-label">Author's Name</label>
                            <input type="text" name="autor_books" class="form-control"
                                placeholder="Enter Author's Name" value="{{ $books->autor_books }}">
                        </div>

                        <!-- Year of Publication -->
                        <div class="col-12">
                            <label class="form-label">Year of Publication</label>
                            <input type="text" name="year_books" class="form-control"
                                placeholder="Enter Year of Publication" value="{{ $books->year_books }}">
                        </div>

                        <!-- Publisher Name -->
                        <div class="col-12">
                            <label class="form-label">Publisher Name</label>
                            <input type="text" name="publisher_books" class="form-control"
                                placeholder="Enter Publisher Name" value="{{ $books->publisher_books }}">
                        </div>
                    </div>
                    <div class="col-md-6 gay-6">
                        <!-- Number of Books -->
                        <div class="col-12">
                            <label class="form-label">Number of Books</label>
                            <input type="text" name="number_books" class="form-control"
                                placeholder="Enter Number of Books" value="{{ $books->number_books }}">
                        </div>

                        <!-- Category Code -->
                        <div class="col-12">
                            <label class="form-label">Category Code</label>
                            <input type="text" id="code_category" name="code_category" class="form-control"
                                placeholder="Enter Category Code" value="{{ $books->code_category }}">
                        </div>

                        <!-- Category Name -->
                        <div class="col-12">
                            <label class="form-label">Category Name</label>
                            <input type="text" id="name_category" name="name_category" class="form-control"
                                placeholder="Enter Category Name" value="" readonly>
                        </div>

                        <!-- Shelf Number -->
                        <div class="col-12">
                            <label class="form-label">Shelf Number</label>
                            <select name="id_rack" id="rak" class="form-select">
                                <option selected disabled>== Select Shelf ==</option>
                                @foreach ($rack_all as $racks)
                                    <option value="{{ $racks->id }}"
                                        {{ $books->id_rack == $racks->id ? 'selected' : '' }}>
                                        {{ $racks->name_rack }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub Number -->
                        <div class="col-12">
                            <label class="form-label">Sub Number</label>
                            <select name="name_rack" id="subs" class="form-select">
                                <option selected disabled>== Select Sub Number ==</option>
                            </select>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary-600 text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
